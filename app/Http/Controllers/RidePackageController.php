<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RidePackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class RidePackageController extends Controller
{
    public function index()
    {
        $packages = RidePackage::with('rows')->latest()->get();

        Log::info('RidePackage index(): loaded', [
            'count' => $packages->count(),
        ]);

        return view('admin.ride-packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.ride-packages.create');
    }

    public function store(Request $request)
    {
        Log::info('RidePackage store(): START', [
            'request' => $request->except(['image']),
            'has_image' => $request->hasFile('image'),
        ]);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2000',

            // rows fields (array)
            'rows' => 'nullable|array',
            'rows.*.label' => 'required_with:rows|string|max:255',
            'rows.*.price' => 'required_with:rows|string|max:255',
            'rows.*.suffix' => 'nullable|string|max:255',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageName = time() . '_' . $imageFile->getClientOriginalName();
            $dest = public_path('storage/ride-packages');

            if (!File::exists($dest)) {
                File::makeDirectory($dest, 0755, true);
                Log::info('RidePackage store(): DIRECTORY CREATED', ['dest' => $dest]);
            }

            $imageFile->move($dest, $imageName);
            $imagePath = 'storage/ride-packages/' . $imageName;

            Log::info('RidePackage store(): IMAGE SAVED', [
                'image_path' => $imagePath,
            ]);
        }

        $package = RidePackage::create([
            'title' => $validated['title'],
            'image' => $imagePath,
        ]);

        Log::info('RidePackage store(): PACKAGE CREATED', [
            'package_id' => $package->id,
        ]);

        // Save rows
        $rows = $validated['rows'] ?? [];
        foreach ($rows as $i => $row) {
            $package->rows()->create([
                'label' => $row['label'],
                'price' => $row['price'],
                'suffix' => $row['suffix'] ?? null,
            ]);
        }

        Log::info('RidePackage store(): ROWS CREATED', [
            'package_id' => $package->id,
            'rows_count' => count($rows),
        ]);

        Log::info('RidePackage store(): END', [
            'package_id' => $package->id,
        ]);

        return redirect()->route('admin.ride-packages.index')
            ->with('success', 'Ride package created successfully!');
    }

    public function edit(RidePackage $ridePackage)
    {
        $ridePackage->load('rows');

        Log::info('RidePackage edit(): loaded', [
            'package_id' => $ridePackage->id,
            'rows_count' => $ridePackage->rows->count(),
        ]);

        return view('admin.ride-packages.edit', compact('ridePackage'));
    }

    public function update(Request $request, RidePackage $ridePackage)
    {
        Log::info('RidePackage update(): START', [
            'package_id' => $ridePackage->id,
            'request' => $request->except(['image']),
            'has_image' => $request->hasFile('image'),
        ]);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2000',

            // rows fields (array)
            'rows' => 'nullable|array',
            'rows.*.label' => 'required_with:rows|string|max:255',
            'rows.*.price' => 'required_with:rows|string|max:255',
            'rows.*.suffix' => 'nullable|string|max:255',
        ]);

        // Handle new image (replace old)
        if ($request->hasFile('image')) {
            // delete old file if exists
            if ($ridePackage->image && File::exists(public_path($ridePackage->image))) {
                File::delete(public_path($ridePackage->image));
                Log::info('RidePackage update(): OLD IMAGE DELETED', [
                    'old_image' => $ridePackage->image,
                ]);
            }

            $imageFile = $request->file('image');
            $imageName = time() . '_' . $imageFile->getClientOriginalName();
            $dest = public_path('storage/ride-packages');

            if (!File::exists($dest)) {
                File::makeDirectory($dest, 0755, true);
                Log::info('RidePackage update(): DIRECTORY CREATED', ['dest' => $dest]);
            }

            $imageFile->move($dest, $imageName);
            $ridePackage->image = 'storage/ride-packages/' . $imageName;

            Log::info('RidePackage update(): NEW IMAGE SAVED', [
                'image_path' => $ridePackage->image,
            ]);
        }

        $ridePackage->title = $validated['title'];
        $ridePackage->save();

        Log::info('RidePackage update(): PACKAGE UPDATED', [
            'package_id' => $ridePackage->id,
        ]);

        /**
         * Rows update strategy (simple + reliable):
         * - delete existing rows
         * - re-insert rows from request
         */
        $ridePackage->rows()->delete();

        $rows = $validated['rows'] ?? [];
        foreach ($rows as $row) {
            $ridePackage->rows()->create([
                'label' => $row['label'],
                'price' => $row['price'],
                'suffix' => $row['suffix'] ?? null,
            ]);
        }

        Log::info('RidePackage update(): ROWS REPLACED', [
            'package_id' => $ridePackage->id,
            'rows_count' => count($rows),
        ]);

        Log::info('RidePackage update(): END', [
            'package_id' => $ridePackage->id,
        ]);

        return redirect()->route('admin.ride-packages.index')
            ->with('success', 'Ride package updated successfully!');
    }

    public function destroy(RidePackage $ridePackage)
    {
        Log::info('RidePackage destroy(): START', [
            'package_id' => $ridePackage->id,
        ]);

        // delete image
        if ($ridePackage->image && File::exists(public_path($ridePackage->image))) {
            File::delete(public_path($ridePackage->image));
            Log::info('RidePackage destroy(): IMAGE DELETED', [
                'image' => $ridePackage->image,
            ]);
        }

        $ridePackage->delete();

        Log::info('RidePackage destroy(): END', [
            'package_id' => $ridePackage->id,
        ]);

        return redirect()->route('admin.ride-packages.index')
            ->with('success', 'Ride package deleted successfully!');
    }
}
