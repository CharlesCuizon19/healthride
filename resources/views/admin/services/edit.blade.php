@extends('layouts.admin')

@section('title', 'Services / Edit Service')

@section('content')
<div class="max-w-screen-2xl mx-auto">

    {{-- Page Title --}}
    <h1 class="text-2xl font-semibold mb-6 text-[#0A8B6C]">
        EDIT SERVICE
    </h1>

    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-8 md:p-10">

        @if(session('error'))
        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-red-700">
            {{ session('error') }}
        </div>
        @endif

        <form action="{{ route('admin.services.update', $service->id) }}"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-8">
            @csrf
            @method('PUT')

            {{-- Title --}}
            <div>
                <label class="block text-sm font-semibold text-[#071434] mb-2">Title</label>
                <input type="text"
                    name="title"
                    value="{{ old('title', $service->title) }}"
                    required
                    class="w-full rounded-xl border border-gray-200 px-4 py-3
                              focus:outline-none focus:ring-4 focus:ring-emerald-100 focus:border-emerald-400 transition">
                @error('title') <p class="text-red-600 text-sm mt-2">{{ $message }}</p> @enderror
            </div>

            {{-- Description --}}
            <div>
                <label class="block text-sm font-semibold text-[#071434] mb-2">Description</label>
                <textarea name="description"
                    rows="5"
                    required
                    class="w-full rounded-xl border border-gray-200 px-4 py-3 resize-none
                                 focus:outline-none focus:ring-4 focus:ring-emerald-100 focus:border-emerald-400 transition">{{ old('description', $service->description) }}</textarea>
                @error('description') <p class="text-red-600 text-sm mt-2">{{ $message }}</p> @enderror
            </div>

            {{-- Benefits --}}
            <div>
                <label class="block text-sm font-semibold text-[#071434] mb-3">Benefits</label>

                @php
                // List of all possible benefits
                $benefitsList = [
                'On-Time Pickups & Drop-Offs for every scheduled dialysis session',
                'Wheelchair-Accessible Vehicles for maximum comfort and safety',
                'Caring, Trained Staff who understand the needs of dialysis patients',
                'Flexible Scheduling for recurring or one-time appointments',
                ];

                // Decode existing benefits JSON from DB
                $serviceBenefits = json_decode(old('benefits', $service->benefits), true) ?? [];
                @endphp

                <div class="space-y-3">
                    @foreach($benefitsList as $benefit)
                    <label class="flex items-start gap-3 cursor-pointer">
                        <input
                            type="checkbox"
                            name="benefits[]"
                            value="{{ $benefit }}"
                            class="mt-1 w-5 h-5 text-[#0A8B6C] border-gray-300 rounded focus:ring-[#0A8B6C]"
                            {{ in_array($benefit, $serviceBenefits) ? 'checked' : '' }}>
                        <span class="text-gray-700">{{ $benefit }}</span>
                    </label>
                    @endforeach
                </div>

                @error('benefits')
                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>


            {{-- Current Thumbnail --}}
            <div class="space-y-3">
                <p class="block text-sm font-semibold text-[#071434]">Current Thumbnail</p>
                @if($service->thumbnail)
                <img src="{{ asset($service->thumbnail) }}"
                    class="w-96 h-52 object-cover rounded-xl border border-gray-200 shadow-sm bg-white">
                @else
                <p class="text-sm text-gray-500">No thumbnail uploaded yet.</p>
                @endif
            </div>

            {{-- Replace Thumbnail --}}
            <div class="rounded-2xl border-2 border-dashed border-gray-200 bg-[#f9fbfd] p-10 text-center">
                <p class="font-semibold mb-2 text-[#071434]">Replace Thumbnail (optional)</p>

                <input type="file" name="thumbnail" id="thumbnail" class="hidden" accept="image/*">
                <label for="thumbnail"
                    class="cursor-pointer inline-block px-6 py-2 rounded-xl text-white font-semibold"
                    style="background:linear-gradient(to right,#0A8B6C,#0fbf9b)">
                    Upload Thumbnail
                </label>
            </div>

            {{-- Thumbnail Preview --}}
            <div id="thumb-preview-container" class="hidden">
                <p class="font-semibold mb-3 text-[#071434]">New Thumbnail Preview</p>
                <div id="thumb-preview"></div>
            </div>

            {{-- Existing Images --}}
            <div class="space-y-3">
                <p class="font-semibold text-[#071434]">
                    Existing Service Images ({{ $service->images->count() }}/4)
                </p>
                <div class="flex flex-wrap gap-4">
                    @foreach($service->images as $img)
                    <img src="{{ asset($img->image) }}"
                        class="w-64 h-40 object-cover rounded-xl border shadow-sm">
                    @endforeach
                </div>
            </div>

            {{-- Add New Service Images --}}
            <div class="rounded-2xl border-2 border-dashed border-gray-200 bg-[#f9fbfd] p-10 text-center">
                <p class="font-semibold mb-2 text-[#071434]">Add New Service Images</p>

                <input type="file" name="images[]" id="service_images" class="hidden" multiple accept="image/*">
                <label for="service_images"
                    class="cursor-pointer inline-block px-6 py-2 rounded-xl text-white font-semibold"
                    style="background:linear-gradient(to right,#0A8B6C,#0fbf9b)">
                    Upload Images
                </label>
            </div>

            {{-- New Images Preview --}}
            <div id="images-preview-container" class="hidden">
                <p class="font-semibold mb-3 text-[#071434]">New Images Preview</p>
                <div id="images-preview" class="flex flex-wrap gap-4"></div>
            </div>

            {{-- Actions --}}
            <div class="flex justify-between pt-6">
                <a href="{{ route('admin.services.index') }}"
                    class="px-6 py-2 border rounded-xl">← Back</a>
                <button type="submit"
                    class="px-6 py-2 rounded-xl text-white font-semibold"
                    style="background:linear-gradient(to right,#0A8B6C,#0fbf9b)">
                    Update Service
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const maxSizeKB = 2000; // 2MB
    const maxImages = 4;

    // -----------------------
    // Thumbnail preview + validation
    // -----------------------
    const thumbInput = document.getElementById('thumbnail');
    const thumbPreviewBox = document.getElementById('thumb-preview-container');
    const thumbPreview = document.getElementById('thumb-preview');

    thumbInput?.addEventListener('change', e => {
        const file = e.target.files[0];
        thumbPreview.innerHTML = '';

        if (!file) return thumbPreviewBox.classList.add('hidden');

        // Size validation
        if (file.size / 1024 > maxSizeKB) {
            thumbInput.value = '';
            thumbPreviewBox.classList.add('hidden');

            Swal.fire({
                icon: 'error',
                title: 'Thumbnail too large',
                text: 'The thumbnail must not exceed 2MB (2000KB).',
                confirmButtonColor: '#0A8B6C'
            });
            return;
        }

        thumbPreviewBox.classList.remove('hidden');
        const img = document.createElement('img');
        img.src = URL.createObjectURL(file);
        img.className = 'w-96 h-52 object-cover rounded-xl border shadow-sm';
        thumbPreview.appendChild(img);
    });

    // -----------------------
    // Service images preview + validation
    // -----------------------
    const imagesInput = document.getElementById('service_images');
    const imagesBox = document.getElementById('images-preview-container');
    const imagesPreview = document.getElementById('images-preview');

    imagesInput?.addEventListener('change', e => {
        let files = [...e.target.files];
        imagesPreview.innerHTML = '';

        // Size validation
        const oversized = files.find(f => f.size / 1024 > maxSizeKB);
        if (oversized) {
            imagesInput.value = '';
            imagesBox.classList.add('hidden');

            Swal.fire({
                icon: 'error',
                title: 'Image too large',
                text: 'Each image must not exceed 2MB (2000KB).',
                confirmButtonColor: '#0A8B6C'
            });

            return;
        }

        // Count validation
        if (files.length > maxImages) {
            const dt = new DataTransfer();
            files.slice(0, maxImages).forEach(f => dt.items.add(f));
            imagesInput.files = dt.files;
            files = [...dt.files];

            Swal.fire({
                icon: 'warning',
                title: 'Too many images',
                text: 'You can only upload up to 4 images.',
                confirmButtonColor: '#0A8B6C'
            });
        }

        if (!files.length) {
            imagesBox.classList.add('hidden');
            return;
        }

        imagesBox.classList.remove('hidden');

        files.forEach((file, idx) => {
            const wrapper = document.createElement('div');
            wrapper.className = 'relative';

            const img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            img.className = 'w-64 h-40 object-cover rounded-xl border shadow-sm';

            const btn = document.createElement('button');
            btn.type = 'button';
            btn.innerHTML = '✖';
            btn.className = 'absolute -top-1 -right-1 bg-red-600 text-white w-7 h-7 rounded-full';

            btn.onclick = () => {
                const current = [...imagesInput.files];
                current.splice(idx, 1);
                const dt = new DataTransfer();
                current.forEach(f => dt.items.add(f));
                imagesInput.files = dt.files;
                imagesInput.dispatchEvent(new Event('change'));
            };

            wrapper.appendChild(img);
            wrapper.appendChild(btn);
            imagesPreview.appendChild(wrapper);
        });
    });
</script>
@endpush
@endsection