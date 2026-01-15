<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::latest()->paginate(10);
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store banner
     */
    public function store(Request $request)
    {
        Log::info('Banner store START', [
            'request' => $request->except('media'),
        ]);

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'sub_title' => 'nullable|string',
            'media'       => 'required|image|mimes:jpg,jpeg,png,webp,gif|max:5120',
        ]);

        $file = $request->file('media');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('storage/banners'), $filename);

        $imagePath = 'storage/banners/' . $filename;

        Banner::create([
            'title'       => $validated['title'],
            'sub_title' => $validated['sub_title'] ?? null,
            'image_path'  => $imagePath,
        ]);

        Log::info('Banner store SUCCESS', [
            'image_path' => $imagePath,
        ]);

        return redirect()
            ->route('admin.banners.index')
            ->with('success', 'Banner created successfully.');
    }

    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Update banner
     */
    public function update(Request $request, Banner $banner)
    {
        Log::info('Banner update START', [
            'banner_id' => $banner->id,
        ]);

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'sub_title' => 'nullable|string',
            'media'       => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:5120',
        ]);

        // If new image uploaded
        if ($request->hasFile('media')) {
            $file = $request->file('media');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/banners'), $filename);

            $newPath = 'storage/banners/' . $filename;

            // Delete old image
            if ($banner->image_path && file_exists(public_path($banner->image_path))) {
                unlink(public_path($banner->image_path));
                Log::info('Old banner image deleted', [
                    'old_path' => $banner->image_path,
                ]);
            }

            $validated['image_path'] = $newPath;
        }

        $banner->update([
            'title'       => $validated['title'],
            'sub_title' => $validated['sub_title'] ?? $banner->sub_title,
            'image_path'  => $validated['image_path'] ?? $banner->image_path,
        ]);

        Log::info('Banner update SUCCESS', [
            'banner_id' => $banner->id,
        ]);

        return redirect()
            ->route('admin.banners.index')
            ->with('success', 'Banner updated successfully.');
    }

    /**
     * Delete banner
     */
    public function destroy(Banner $banner)
    {
        Log::info('Banner delete START', [
            'banner_id' => $banner->id,
        ]);

        if ($banner->image_path && file_exists(public_path($banner->image_path))) {
            unlink(public_path($banner->image_path));
            Log::info('Banner image deleted', [
                'path' => $banner->image_path,
            ]);
        }

        $banner->delete();

        return redirect()
            ->route('admin.banners.index')
            ->with('success', 'Banner deleted successfully.');
    }
}
