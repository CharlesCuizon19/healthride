@extends('layouts.admin')

@section('title', 'Homepage Banners / Create Banner')

@section('content')
<div class="max-w-screen-2xl mx-auto">

    {{-- Page Title --}}
    <h1 class="text-2xl font-semibold mb-6 text-[#0A8B6C]">
        CREATE BANNER
    </h1>

    {{-- Card --}}
    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-8 md:p-10">

        {{-- Error Alert --}}
        @if(session('error'))
        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-red-700">
            {{ session('error') }}
        </div>
        @endif

        <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf

            {{-- Title --}}
            <div>
                <label for="title" class="block text-sm font-semibold text-[#071434] mb-2">
                    Title
                </label>

                <input
                    type="text"
                    name="title"
                    id="title"
                    value="{{ old('title') }}"
                    placeholder="Enter banner title"
                    required
                    class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3
               text-[#071434] placeholder-gray-400 shadow-sm
               focus:outline-none focus:ring-4 focus:ring-emerald-100
               focus:border-emerald-400 transition" />

                @error('title')
                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            {{-- Subtitle --}}
            <div>
                <label for="sub_title" class="block text-sm font-semibold text-[#071434] mb-2">
                    Subtitle
                </label>

                <input
                    type="text"
                    name="sub_title"
                    id="sub_title"
                    value="{{ old('sub_title') }}"
                    placeholder="Enter banner subtitle"
                    class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3
               text-[#071434] placeholder-gray-400 shadow-sm
               focus:outline-none focus:ring-4 focus:ring-emerald-100
               focus:border-emerald-400 transition" />

                @error('sub_title')
                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>


            {{-- Image Upload --}}
            <div class="rounded-2xl border-2 border-dashed border-gray-200 bg-[#f9fbfd] p-10 text-center
                        hover:border-emerald-300 transition">

                <p class="font-bold text-[#071434] text-lg mb-1">Image Upload</p>
                <p class="text-sm text-gray-500 mb-6">
                    Upload a banner image (Max 5MB • JPG • PNG • WEBP • GIF)
                </p>

                <label for="media" class="cursor-pointer inline-flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-12 w-12 text-emerald-600 mb-2"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 15a4 4 0 014-4h.586a1 1 0 01.707.293l2.414 2.414a1 1 0 001.414 0l2.414-2.414a1 1 0 01.707-.293H17a4 4 0 014 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2v-1z" />
                    </svg>

                    <span class="text-gray-600">Click below or choose an image</span>

                    <input type="file" name="media" id="media" class="hidden" accept="image/*" />

                    {{-- Upload Button --}}
                    <span
                        class="mt-4 px-6 py-2 rounded-xl font-semibold text-white
                               shadow-sm hover:shadow-md hover:-translate-y-[1px] transition"
                        style="background: linear-gradient(to right, #0A8B6C, #0fbf9b);">
                        Upload Image
                    </span>
                </label>

                @error('media')
                <p class="text-red-600 text-sm mt-4">{{ $message }}</p>
                @enderror
            </div>

            {{-- Preview --}}
            <div id="preview-container" class="hidden">
                <p class="font-semibold text-[#071434] mb-3">Preview</p>
                <div id="preview" class="flex justify-start"></div>
            </div>

            {{-- Actions --}}
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4 pt-4">
                <a href="{{ route('admin.banners.index') }}"
                    class="px-6 py-2.5 rounded-xl border border-gray-200 bg-white
                          text-[#071434] font-semibold hover:bg-gray-50 transition no-underline">
                    ← Back
                </a>

                <button type="submit"
                    class="px-6 py-2.5 rounded-xl font-semibold text-white
                               shadow-sm hover:shadow-md hover:-translate-y-[1px] transition"
                    style="background: linear-gradient(to right, #0A8B6C, #0fbf9b);">
                    Save Banner
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Image preview with remove button
    document.getElementById('media').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const previewContainer = document.getElementById('preview-container');
        const preview = document.getElementById('preview');
        preview.innerHTML = "";

        if (file && file.type.startsWith("image/")) {
            previewContainer.classList.remove('hidden');

            const reader = new FileReader();
            reader.onload = function(e) {
                const wrapper = document.createElement("div");
                wrapper.className = "relative inline-block";

                const img = document.createElement("img");
                img.src = e.target.result;
                img.className =
                    "w-96 h-52 object-cover rounded-xl shadow-sm border border-gray-200 bg-white";

                const removeBtn = document.createElement("button");
                removeBtn.type = "button";
                removeBtn.innerHTML = "✖";
                removeBtn.className =
                    "absolute -top-1 -right-1 bg-red-600 text-white rounded-full w-8 h-8 flex items-center justify-center text-sm shadow hover:bg-red-700 transition";

                removeBtn.onclick = function() {
                    document.getElementById('media').value = "";
                    preview.innerHTML = "";
                    previewContainer.classList.add('hidden');
                };

                wrapper.appendChild(img);
                wrapper.appendChild(removeBtn);
                preview.appendChild(wrapper);
            };

            reader.readAsDataURL(file);
        } else {
            previewContainer.classList.add('hidden');
        }
    });
</script>
@endpush
@endsection