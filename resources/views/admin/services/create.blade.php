@extends('layouts.admin')

@section('title', 'Services / Create Service')

@section('content')
<div class="max-w-screen-2xl mx-auto">

    {{-- Page Title --}}
    <h1 class="text-2xl font-semibold mb-6 text-[#0A8B6C]">
        CREATE SERVICE
    </h1>

    {{-- Card --}}
    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-8 md:p-10">

        {{-- Error Alert --}}
        @if(session('error'))
        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-red-700">
            {{ session('error') }}
        </div>
        @endif

        <form action="{{ route('admin.services.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-8">
            @csrf

            {{-- Title --}}
            <div>
                <label class="block text-sm font-semibold text-[#071434] mb-2">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" required
                    class="w-full rounded-xl border border-gray-200 px-4 py-3 focus:ring-4 focus:ring-emerald-100">
                @error('title') <p class="text-red-600 text-sm mt-2">{{ $message }}</p> @enderror
            </div>

            {{-- Description --}}
            <div>
                <label class="block text-sm font-semibold text-[#071434] mb-2">Description</label>
                <textarea name="description" rows="5" required
                    class="w-full rounded-xl border border-gray-200 px-4 py-3 resize-none focus:ring-4 focus:ring-emerald-100">{{ old('description') }}</textarea>
                @error('description') <p class="text-red-600 text-sm mt-2">{{ $message }}</p> @enderror
            </div>

            {{-- Benefits --}}
            <div>
                <label class="block text-sm font-semibold text-[#071434] mb-3">Benefits</label>

                @php
                $benefitsList = [
                'On-Time Pickups & Drop-Offs for every scheduled dialysis session',
                'Wheelchair-Accessible Vehicles for maximum comfort and safety',
                'Caring, Trained Staff who understand the needs of dialysis patients',
                'Flexible Scheduling for recurring or one-time appointments',
                ];

                $oldBenefits = old('benefits', []);
                @endphp

                <div class="space-y-3">
                    @foreach($benefitsList as $benefit)
                    <label class="flex items-start gap-3 cursor-pointer">
                        <input
                            type="checkbox"
                            name="benefits[]"
                            value="{{ $benefit }}"
                            class="mt-1 w-5 h-5 text-[#0A8B6C] border-gray-300 rounded focus:ring-[#0A8B6C]"
                            {{ in_array($benefit, $oldBenefits) ? 'checked' : '' }}>

                        <span class="text-gray-700">
                            {{ $benefit }}
                        </span>
                    </label>
                    @endforeach
                </div>

                @error('benefits')
                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>


            {{-- Thumbnail Upload --}}
            <div class="border-2 border-dashed rounded-2xl p-10 text-center">
                <p class="font-semibold mb-2">Thumbnail Image</p>

                <input type="file" name="thumbnail" id="thumbnail" class="hidden" accept="image/*" required>
                <label for="thumbnail"
                    class="cursor-pointer inline-block px-6 py-2 rounded-xl text-white"
                    style="background:linear-gradient(to right,#0A8B6C,#0fbf9b)">
                    Upload Thumbnail
                </label>

                @error('thumbnail') <p class="text-red-600 text-sm mt-2">{{ $message }}</p> @enderror
            </div>

            {{-- Thumbnail Preview --}}
            <div id="thumb-preview-container" class="hidden">
                <p class="font-semibold mb-3">Thumbnail Preview</p>
                <div id="thumb-preview"></div>
            </div>

            {{-- Service Images Upload --}}
            <div class="border-2 border-dashed rounded-2xl p-10 text-center">
                <p class="font-semibold mb-2">Service Images (Max 4)</p>

                <input type="file" name="service_images[]" id="service_images" class="hidden" multiple accept="image/*">
                <label for="service_images"
                    class="cursor-pointer inline-block px-6 py-2 rounded-xl text-white"
                    style="background:linear-gradient(to right,#0A8B6C,#0fbf9b)">
                    Upload Images
                </label>

                @error('service_images') <p class="text-red-600 text-sm mt-2">{{ $message }}</p> @enderror
            </div>

            {{-- Images Preview --}}
            <div id="images-preview-container" class="hidden">
                <p class="font-semibold mb-3">Images Preview</p>
                <div id="images-preview" class="flex flex-wrap gap-4"></div>
            </div>

            {{-- Actions --}}
            <div class="flex justify-between pt-6">
                <a href="{{ route('admin.services.index') }}"
                    class="px-6 py-2 border rounded-xl">← Back</a>

                <button type="submit"
                    class="px-6 py-2 rounded-xl text-white"
                    style="background:linear-gradient(to right,#0A8B6C,#0fbf9b)">
                    Save Service
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    const MAX_SIZE_KB = 2000; // 2MB limit

    /* Thumbnail preview + size check */
    document.getElementById('thumbnail').addEventListener('change', e => {
        const file = e.target.files[0];
        const box = document.getElementById('thumb-preview-container');
        const preview = document.getElementById('thumb-preview');
        preview.innerHTML = '';

        if (!file) return box.classList.add('hidden');

        // Check file size
        if (file.size / 1024 > MAX_SIZE_KB) {
            Swal.fire({
                icon: 'error',
                title: 'File too large',
                text: 'Thumbnail must be less than 2MB.',
            });
            e.target.value = ''; // Clear file input
            box.classList.add('hidden');
            return;
        }

        box.classList.remove('hidden');
        const img = document.createElement('img');
        img.src = URL.createObjectURL(file);
        img.className = 'w-96 h-52 object-cover rounded-xl border';
        preview.appendChild(img);
    });

    /* Service images preview + size check */
    document.getElementById('service_images').addEventListener('change', e => {
        const files = [...e.target.files].slice(0, 4);
        const box = document.getElementById('images-preview-container');
        const preview = document.getElementById('images-preview');
        preview.innerHTML = '';

        if (!files.length) return box.classList.add('hidden');

        let invalidFile = false;

        files.forEach((file, index) => {
            if (file.size / 1024 > MAX_SIZE_KB) {
                invalidFile = true;
                Swal.fire({
                    icon: 'error',
                    title: 'File too large',
                    text: `Image ${index + 1} exceeds 2MB and will not be uploaded.`,
                });
                // Remove oversized file from the input
                e.target.value = '';
                box.classList.add('hidden');
                return;
            }

            const img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            img.className = 'w-64 h-40 object-cover rounded-xl border';
            preview.appendChild(img);
        });

        if (!invalidFile) {
            box.classList.remove('hidden');
        }

        if (e.target.files.length > 4) {
            Swal.fire('Limit reached', 'Only 4 images allowed', 'warning');
        }
    });

    /* Optional: prevent form submit if files exceed size */
    document.querySelector('form').addEventListener('submit', function(e) {
        const thumb = document.getElementById('thumbnail').files[0];
        const images = document.getElementById('service_images').files;

        if (thumb && thumb.size / 1024 > MAX_SIZE_KB) {
            e.preventDefault();
            Swal.fire('File too large', 'Thumbnail exceeds 2MB.', 'error');
            return false;
        }

        for (let i = 0; i < images.length; i++) {
            if (images[i].size / 1024 > MAX_SIZE_KB) {
                e.preventDefault();
                Swal.fire('File too large', `Service image ${i + 1} exceeds 2MB.`, 'error');
                return false;
            }
        }
    });
</script>
@endpush
@endsection