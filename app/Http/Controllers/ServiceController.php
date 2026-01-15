<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ServiceController extends Controller
{
    /**
     * Display a listing of the services.
     */
    public function index()
    {
        $services = Service::latest()->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new service.
     */
    public function create()
    {
        return view('admin.services.create');
    }


    public function store(Request $request)
    {
        Log::info('Service STORE START', [
            'request' => $request->except(['thumbnail', 'service_images']),
            'has_thumbnail' => $request->hasFile('thumbnail'),
            'service_images_count' => $request->hasFile('service_images')
                ? count($request->file('service_images'))
                : 0,
        ]);

        // ============================
        // ✅ Validate
        // ============================
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'description'      => 'required|string|max:1000',
            'benefits'         => 'required|array',       // ✅ Must be array
            'benefits.*'       => 'string|max:255',       // Each benefit is string
            'thumbnail'        => 'required|image|mimes:jpg,jpeg,png,webp|max:2000',
            'service_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2000',
        ]);

        // ============================
        // ✅ Upload THUMBNAIL
        // ============================
        $thumbnailFile = $request->file('thumbnail');
        $thumbnailName = time() . '_' . $thumbnailFile->getClientOriginalName();
        $thumbnailFile->move(public_path('storage/service_thumbnails'), $thumbnailName);
        $thumbnailPath = 'storage/service_thumbnails/' . $thumbnailName;

        Log::info('Service STORE THUMBNAIL uploaded', [
            'thumbnail_path' => $thumbnailPath,
        ]);

        // ============================
        // ✅ Create Service
        // ============================
        $service = Service::create([
            'title'       => $validated['title'],
            'description' => $validated['description'],
            'benefits'    => json_encode($validated['benefits']), // ✅ Store as JSON
            'thumbnail'   => $thumbnailPath,
        ]);

        Log::info('Service STORE SERVICE created', [
            'service_id' => $service->id,
        ]);

        // ============================
        // ✅ Upload SERVICE IMAGES
        // ============================
        if ($request->hasFile('service_images')) {
            foreach ($request->file('service_images') as $index => $file) {
                $filename = time() . '_' . $index . '_' . $file->getClientOriginalName();
                $file->move(public_path('storage/service_images'), $filename);

                $imagePath = 'storage/service_images/' . $filename;

                ServiceImages::create([
                    'service_id' => $service->id,
                    'image'      => $imagePath,
                ]);

                Log::info('Service STORE IMAGE saved', [
                    'service_id' => $service->id,
                    'image_path' => $imagePath,
                ]);
            }
        }

        Log::info('Service STORE SUCCESS', [
            'service_id' => $service->id,
        ]);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }


    /**
     * Show the form for editing the service.
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified service.
     */
    public function update(Request $request, Service $service)
    {
        Log::info('Service UPDATE START', [
            'service_id' => $service->id,
            'request' => $request->except(['thumbnail', 'service_images']),
            'has_thumbnail' => $request->hasFile('thumbnail'),
            'has_images' => $request->hasFile('service_images'),
            'incoming_images_count' => $request->hasFile('service_images') ? count($request->file('service_images')) : 0,
            'existing_images_count' => $service->images()->count(),
        ]);

        // ============================
        // ✅ Validate
        // ============================
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'description'      => 'required|string|max:1000',
            'benefits'         => 'required|array',
            'benefits.*'       => 'string|max:255',
            'thumbnail'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2000',
            'service_images'   => 'nullable|array|max:4',
            'service_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2000',
        ]);

        // ============================
        // ✅ Update text fields
        // ============================
        $service->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'benefits' => json_encode($validated['benefits']),
        ]);

        Log::info('Service UPDATE TEXT SAVED', ['service_id' => $service->id]);

        // ============================
        // ✅ Thumbnail update
        // ============================
        if ($request->hasFile('thumbnail')) {
            if ($service->thumbnail && file_exists(public_path($service->thumbnail))) {
                unlink(public_path($service->thumbnail));
                Log::info('Service UPDATE old thumbnail deleted', ['service_id' => $service->id, 'old_thumbnail' => $service->thumbnail]);
            }

            $thumbFile = $request->file('thumbnail');
            $thumbName = time() . '_' . $thumbFile->getClientOriginalName();
            $dest = public_path('storage/service_thumbnails');
            if (!file_exists($dest)) mkdir($dest, 0755, true);
            $thumbFile->move($dest, $thumbName);

            $service->thumbnail = 'storage/service_thumbnails/' . $thumbName;
            $service->save();

            Log::info('Service UPDATE new thumbnail saved', ['service_id' => $service->id, 'thumbnail' => $service->thumbnail]);
        }

        // ============================
        // ✅ Service Images update (replace old images)
        // ============================
        if ($request->hasFile('service_images')) {
            // Delete old images
            foreach ($service->images as $old) {
                if ($old->image && file_exists(public_path($old->image))) {
                    unlink(public_path($old->image));
                    Log::info('Service UPDATE deleted old image', ['service_id' => $service->id, 'old_image' => $old->image]);
                }
                $old->delete();
            }

            // Save new images
            $dest = public_path('storage/service_images');
            if (!file_exists($dest)) mkdir($dest, 0755, true);

            foreach ($request->file('service_images') as $index => $file) {
                $filename = time() . '_' . $index . '_' . $file->getClientOriginalName();
                $file->move($dest, $filename);
                $imagePath = 'storage/service_images/' . $filename;

                $service->images()->create(['image' => $imagePath]);

                Log::info('Service UPDATE new image saved', ['service_id' => $service->id, 'image' => $imagePath]);
            }
        }

        Log::info('Service UPDATE SUCCESS', ['service_id' => $service->id]);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }


    /**
     * Remove the specified service.
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        // Helper function to delete a file if it exists
        $deleteFile = function ($path) {
            if ($path && file_exists(public_path($path))) {
                unlink(public_path($path));
            }
        };

        // Delete thumbnail
        $deleteFile($service->thumbnail);

        // Delete service images
        foreach ($service->images as $image) {
            $deleteFile($image->image);
            $image->delete();
        }

        // Delete the service record
        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');
    }
}
