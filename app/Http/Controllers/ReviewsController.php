<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ReviewsController extends Controller
{
    /**
     * Display a listing of reviews.
     */
    public function index()
    {
        $reviews = Review::orderBy('created_at', 'desc')->get();
        return view('admin.reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new review.
     */
    public function create()
    {
        return view('admin.reviews.create');
    }

    /**
     * Store a newly created review in storage.
     */
    public function store(Request $request)
    {
        Log::info('Review store(): START', [
            'request' => $request->except(['image']),
            'has_image' => $request->hasFile('image'),
        ]);

        $validated = $request->validate([
            'full_name'  => 'required|string|max:255',
            'role'       => 'required|string|max:255',
            'review'     => 'required|string|max:1000',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2000',
        ]);

        Log::info('Review store(): VALIDATION PASSED', [
            'validated' => $validated,
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageName = time() . '_' . $imageFile->getClientOriginalName();
            $dest = public_path('storage/reviews');

            Log::info('Review store(): IMAGE UPLOAD START', [
                'original_name' => $imageFile->getClientOriginalName(),
                'destination' => $dest,
            ]);

            if (!File::exists($dest)) {
                File::makeDirectory($dest, 0755, true);
                Log::info('Review store(): DIRECTORY CREATED', [
                    'path' => $dest,
                ]);
            }

            $imageFile->move($dest, $imageName);
            $imagePath = 'storage/reviews/' . $imageName;

            Log::info('Review store(): IMAGE SAVED', [
                'image_path' => $imagePath,
            ]);
        } else {
            Log::info('Review store(): NO IMAGE UPLOADED');
        }

        $review = Review::create([
            'full_name'  => $validated['full_name'],
            'role'       => $validated['role'],
            'review'     => $validated['review'],
            'image_path' => $imagePath,
        ]);

        Log::info('Review store(): REVIEW CREATED', [
            'review_id' => $review->id,
            'image_path' => $imagePath,
        ]);

        Log::info('Review store(): END', [
            'review_id' => $review->id,
        ]);

        return redirect()->back()->with('success', 'You have successfully subscribed!');
    }

    /**
     * Show the form for editing the specified review.
     */
    public function edit(Review $review)
    {
        return view('reviews.edit', compact('review'));
    }

    /**
     * Update the specified review in storage.
     */
    public function update(Request $request, Review $review)
    {
        $validated = $request->validate([
            'full_name'  => 'required|string|max:255',
            'role'       => 'required|string|max:255',
            'review'     => 'required|string|max:1000',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2000',
        ]);

        // Handle new image
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($review->image_path && File::exists(public_path($review->image_path))) {
                File::delete(public_path($review->image_path));
            }

            $imageFile = $request->file('image');
            $imageName = time() . '_' . $imageFile->getClientOriginalName();
            $dest = public_path('storage/reviews');

            if (!File::exists($dest)) {
                File::makeDirectory($dest, 0755, true);
            }

            $imageFile->move($dest, $imageName);
            $review->image_path = 'storage/reviews/' . $imageName;
        }

        $review->update([
            'full_name' => $validated['full_name'],
            'role'      => $validated['role'],
            'review'    => $validated['review'],
        ]);

        return redirect()->route('admin.reviews.index')
            ->with('success', 'Review updated successfully.');
    }

    /**
     * Remove the specified review from storage.
     */
    public function destroy(Review $review)
    {
        // Delete image if exists
        if ($review->image_path && File::exists(public_path($review->image_path))) {
            File::delete(public_path($review->image_path));
        }

        $review->delete();

        return redirect()->route('admin.reviews.index')
            ->with('success', 'Review deleted successfully.');
    }
}
