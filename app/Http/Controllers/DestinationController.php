<?php

namespace App\Http\Controllers;

use App\Models\RidePackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DestinationController extends Controller
{
    /**
     * List destinations
     */
    public function index()
    {
        $destinations = RidePackage::latest()->paginate(10);

        return view('admin.destinations.index', compact('destinations'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('admin.destinations.create');
    }

    /**
     * Store destination
     */
    public function store(Request $request)
    {
        Log::info('Destination store START', [
            'request' => $request->except('image'),
        ]);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp,gif|max:5120',
        ]);

        // Upload image
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('storage/destinations'), $filename);

        $imagePath = 'storage/destinations/' . $filename;

        RidePackage::create([
            'title' => $validated['title'],
            'image' => $imagePath,
        ]);

        Log::info('Destination store SUCCESS', [
            'image_path' => $imagePath,
        ]);

        return redirect()
            ->route('admin.destinations.index')
            ->with('success', 'Destination created successfully.');
    }

    /**
     * Show edit form
     */
    public function edit(RidePackage $destination)
    {
        return view('admin.destinations.edit', compact('destination'));
    }

    /**
     * Update destination
     */
    public function update(Request $request, RidePackage $destination)
    {
        Log::info('Destination update START', [
            'destination_id' => $destination->id,
        ]);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:5120',
        ]);

        // If new image uploaded
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/destinations'), $filename);

            $newPath = 'storage/destinations/' . $filename;

            // Delete old image
            if ($destination->image && file_exists(public_path($destination->image))) {
                unlink(public_path($destination->image));
                Log::info('Old destination image deleted', [
                    'old_path' => $destination->image,
                ]);
            }

            $validated['image'] = $newPath;
        }

        $destination->update([
            'title' => $validated['title'],
            'image' => $validated['image'] ?? $destination->image,
        ]);

        Log::info('Destination update SUCCESS', [
            'destination_id' => $destination->id,
        ]);

        return redirect()
            ->route('admin.destinations.index')
            ->with('success', 'Destination updated successfully.');
    }

    /**
     * Delete destination
     */
    public function destroy(RidePackage $destination)
    {
        Log::info('Destination delete START', [
            'destination_id' => $destination->id,
        ]);

        if ($destination->image && file_exists(public_path($destination->image))) {
            unlink(public_path($destination->image));
            Log::info('Destination image deleted', [
                'path' => $destination->image,
            ]);
        }

        $destination->delete();

        return redirect()
            ->route('admin.destinations.index')
            ->with('success', 'Destination deleted successfully.');
    }
}
