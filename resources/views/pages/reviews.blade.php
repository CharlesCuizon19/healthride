@extends('layouts.app')

@section('page-title', 'Reviews')
@section('content')

<x-banner2 title="Reviews" background="images/reviews.png" />

<x-review-grid
    :reviews="$reviews"
    heading="Reviews That Reflect Our Commitment"
    :initial="6" />

{{-- Share Your Experience CTA + Modal --}}
<section class="w-full pb-40 md:pb-40"
    x-data="{
        open: false,
        preview: null,
        reset() {
            this.preview = null;
            // optional: reset form fields
            this.$refs.form?.reset();
        }
    }">

    <div class="max-w-screen-xl mx-auto px-6 lg:px-10">
        <div
            class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#eef6f4] via-[#f4faf8] to-[#eef6f4]
                   px-8 py-12 md:py-16 text-center shadow-sm">

            {{-- subtle decorative curves --}}
            <div class="absolute -left-24 top-1/2 -translate-y-1/2 w-72 h-72 bg-[#0A8B6C]/10 rounded-full blur-3xl"></div>
            <div class="absolute -right-24 top-1/2 -translate-y-1/2 w-72 h-72 bg-[#071434]/10 rounded-full blur-3xl"></div>

            <div class="relative z-10 max-w-2xl mx-auto">
                <h3 class="text-2xl md:text-3xl font-bold text-[#071434] mb-4">
                    Share Your Experience!
                </h3>

                <p class="text-base md:text-lg text-[#42526e] mb-8">
                    We’d love to hear from you! Your feedback helps us continue providing
                    safe, reliable, and compassionate transportation services for our community.
                </p>

                {{-- Button opens modal --}}
                <button type="button"
                    @click="open = true"
                    class="inline-flex items-center gap-2 px-7 py-3 rounded-lg
                           bg-[#071434] text-white font-semibold
                           shadow-md transition hover:bg-[#0A8B6C] hover:shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                        viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M12 3c-4.97 0-9 3.582-9 8 0 2.387 1.234 4.535 3.22 5.988L5 21l4.133-2.186c.914.246 1.882.186 2.867.186 4.97 0 9-3.582 9-8s-4.03-8-9-8Z" />
                    </svg>
                    Leave a Review
                </button>
            </div>
        </div>
    </div>

    {{-- MODAL --}}
    <div
        x-show="open"
        x-transition.opacity
        class="fixed inset-0 z-[999] flex items-center justify-center px-4"
        style="display:none;"
        @keydown.escape.window="open = false; reset();">
        {{-- Backdrop --}}
        <div class="absolute inset-0 bg-black/50" @click="open = false; reset();"></div>

        {{-- Modal card --}}
        <div
            x-transition
            class="relative z-10 w-full max-w-2xl bg-white rounded-2xl shadow-2xl overflow-hidden">
            {{-- Header --}}
            <div class="flex items-center justify-between px-6 py-4 bg-[#071434] text-white">
                <h4 class="text-lg md:text-xl font-semibold">Leave a Review</h4>
                <button type="button"
                    class="h-9 w-9 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center"
                    @click="open = false; reset();"
                    aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M18.3 5.71a1 1 0 0 0-1.41 0L12 10.59 7.11 5.7A1 1 0 0 0 5.7 7.11L10.59 12l-4.9 4.89a1 1 0 1 0 1.41 1.42L12 13.41l4.89 4.9a1 1 0 0 0 1.42-1.41L13.41 12l4.9-4.89a1 1 0 0 0-.01-1.4Z" />
                    </svg>
                </button>
            </div>

            {{-- Body --}}
            <div class="p-6 md:p-8">
                <form x-ref="form" method="POST" action="{{ route('reviews.store') }}" enctype="multipart/form-data" class="space-y-5">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        {{-- Full Name --}}
                        <div>
                            <label class="block text-sm font-semibold text-[#071434] mb-1">Full Name</label>
                            <input type="text" name="full_name" required
                                class="w-full rounded-lg border border-gray-300 px-4 py-3
                                       focus:outline-none focus:border-[#0A8B6C] focus:ring-2 focus:ring-[#0A8B6C]/25"
                                placeholder="Enter your full name">
                        </div>

                        {{-- Occupation / Role --}}
                        <div>
                            <label class="block text-sm font-semibold text-[#071434] mb-1">Occupation / Role</label>
                            <input type="text" name="role" required
                                class="w-full rounded-lg border border-gray-300 px-4 py-3
                                       focus:outline-none focus:border-[#0A8B6C] focus:ring-2 focus:ring-[#0A8B6C]/25"
                                placeholder="e.g., Patient / Caregiver">
                        </div>
                    </div>

                    {{-- Review --}}
                    <div>
                        <label class="block text-sm font-semibold text-[#071434] mb-1">Review</label>
                        <textarea name="review" rows="5" required
                            class="w-full rounded-lg border border-gray-300 px-4 py-3
                                   focus:outline-none focus:border-[#0A8B6C] focus:ring-2 focus:ring-[#0A8B6C]/25"
                            placeholder="Write your review..."></textarea>
                    </div>

                    {{-- Image Upload --}}
                    <div>
                        <label class="block text-sm font-semibold text-[#071434] mb-2">Image</label>

                        <div class="flex flex-col md:flex-row gap-4 md:items-center">
                            <label
                                class="cursor-pointer inline-flex items-center justify-center gap-2
                                       rounded-lg border border-gray-300 px-4 py-3
                                       hover:border-[#0A8B6C] transition w-full md:w-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#0A8B6C]"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M19 7h-3.17L14 5H10L8.17 7H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-7 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10Z" />
                                </svg>
                                <span class="text-sm font-semibold text-[#071434]">Upload Image</span>

                                <input
                                    type="file"
                                    name="image"
                                    accept="image/*"
                                    class="hidden"
                                    @change="
                                        const file = $event.target.files[0];
                                        if(!file) { preview=null; return; }
                                        preview = URL.createObjectURL(file);
                                    ">
                            </label>

                            {{-- Preview --}}
                            <div class="flex items-center gap-3">
                                <div class="w-14 h-14 rounded-full bg-gray-200 overflow-hidden border border-gray-300">
                                    <template x-if="preview">
                                        <img :src="preview" class="w-full h-full object-cover" alt="Preview">
                                    </template>
                                </div>
                                <div class="text-sm text-gray-500">
                                    Optional preview (jpg/png).
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Actions --}}
                    <div class="flex flex-col-reverse md:flex-row gap-3 md:justify-end pt-2">
                        <button type="button"
                            @click="open = false; reset();"
                            class="w-full md:w-auto px-6 py-3 rounded-lg border border-gray-300
                                   font-semibold text-gray-700 hover:bg-gray-50 transition">
                            Cancel
                        </button>

                        <button type="submit"
                            class="w-full md:w-auto px-6 py-3 rounded-lg bg-[#0A8B6C] text-white font-semibold
                                   hover:bg-[#08785e] transition shadow-md">
                            Submit Review
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', () => {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: "{{ session('success') }}",
            timer: 2500,
            showConfirmButton: false
        });
    });
</script>
@endif

@endsection