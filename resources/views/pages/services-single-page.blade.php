@extends('layouts.app')

@section('content')

<x-banner2 title="Service Details" background="images/services.png" />

{{-- SERVICES SINGLE SECTION (bigger version) --}}
<section class="w-full bg-white pb-20 md:pb-40">
    <div class="max-w-screen-2xl mx-auto px-0">

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

            {{-- LEFT CONTENT --}}
            <div class="lg:col-span-8 space-y-8">

                {{-- Top Card --}}
                <div class="bg-white overflow-hidden">
                    <div class="pb-5 pt-0 md:pb-7 md:pt-0">


                        {{-- Main Image --}}
                        <div class="rounded-2xl overflow-hidden bg-gray-100">
                            <img
                                src="{{ $service->banner_image ?? asset('images/service1.png') }}"
                                alt="{{ $service->title ?? 'Service' }}"
                                class="w-full h-[260px] sm:h-[320px] md:h-[380px] lg:h-[520px] object-cover">
                        </div>

                        {{-- Title + Body --}}
                        <div class="mt-6">
                            <h2 class="text-2xl md:text-4xl font-extrabold text-[#0b1b3a]">
                                {{ $service->title ?? 'Dialysis Transportation' }}
                            </h2>

                            <p class="mt-4 text-xl md:text-xl leading-relaxed text-gray-600">
                                {{ $service->description ?? 'HealthRide Medical Transport provides dependable and comfortable transportation for patients requiring regular dialysis treatments. We understand the importance of consistency, timeliness, and care in every trip. Our trained drivers and healthcare-aware staff ensure that each ride is smooth, safe, and stress-free — allowing patients to focus on their health and recovery, not the logistics of getting there.' }}
                            </p>

                            <a href="#"
                                class="mt-4 inline-flex items-center text-sm md:text-xl font-semibold text-emerald-700 hover:text-emerald-800">
                                Read More
                                <span class="ml-1">›</span>
                            </a>

                            {{-- Service Featured --}}
                            <div class="mt-7">
                                <h3 class="text-lg font-bold text-[#0b1b3a] uppercase tracking-wide">
                                    Service Featured
                                </h3>

                                <ul class="mt-4 space-y-3 text-lg text-gray-700">
                                    @foreach($features as $item)
                                    <li class="flex items-start gap-2">
                                        <span class="mt-0.5 inline-flex h-5 w-5 items-center justify-center">
                                            <img src="{{ asset('images/check-icon.png') }}"
                                                alt="Check"
                                                class="h-5 w-5 object-contain">
                                        </span>

                                        <span class="leading-relaxed">{{ $item }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Gallery Slider (SWIPER) - show 3 images, dots BELOW --}}
                <div class="bg-white ">

                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-sm font-bold text-[#0b1b3a] uppercase tracking-wide">
                            Service Gallery
                        </h3>

                        <div class="flex items-center gap-2">
                            <button type="button"
                                class="gallery-prev h-9 w-9 rounded-full border border-gray-200 hover:bg-gray-50 flex items-center justify-center">
                                ‹
                            </button>
                            <button type="button"
                                class="gallery-next h-9 w-9 rounded-full border border-gray-200 hover:bg-gray-50 flex items-center justify-center">
                                ›
                            </button>
                        </div>
                    </div>

                    {{-- MAIN SLIDER (3 per view on desktop) --}}
                    <div class="swiper serviceGallery pb-10">
                        <div class="swiper-wrapper">
                            @foreach($gallery as $img)
                            <div class="swiper-slide">
                                <img src="{{ $img }}"
                                    class="w-full h-[190px] sm:h-[220px] md:h-[240px] lg:h-[250px] object-cover rounded-xl"
                                    alt="Gallery image">
                            </div>
                            @endforeach
                        </div>

                        {{-- DOTS (kept inside swiper but forced BELOW) --}}
                        <div class="swiper-pagination"></div>
                    </div>
                </div>


                {{-- Why Choose Us --}}
                <div class="bg-[#f4f5f7] rounded-2xl px-8 py-10 text-center border border-gray-200">
                    <h3 class="text-xl md:text-2xl font-extrabold text-[#0b1b3a]">
                        Why Choose Us?
                    </h3>

                    <p class="mt-3 md:text-lg text-black max-w-3xl mx-auto">
                        Our caring team ensures every ride is comfortable, on time, and stress-free because your care doesn’t stop when the ride begins.
                    </p>

                    <a href="#"
                        class="mt-6 inline-flex items-center justify-center gap-2 px-6 py-3 rounded-md bg-[#0b1b3a] text-white text-sm md:text-base font-semibold hover:bg-[#08122a] transition">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" class="size-6">
                            <path fill="currentColor"
                                d="m255.43 117l-14-35a15.93 15.93 0 0 0-14.85-10H192v-8a8 8 0 0 0-8-8H32a16 16 0 0 0-16 16v112a16 16 0 0 0 16 16h17a32 32 0 0 0 62 0h50a32 32 0 0 0 62 0h17a16 16 0 0 0 16-16v-64a7.9 7.9 0 0 0-.57-3M80 208a16 16 0 1 1 16-16a16 16 0 0 1-16 16m56-80h-16v16a8 8 0 0 1-16 0v-16H88a8 8 0 0 1 0-16h16V96a8 8 0 0 1 16 0v16h16a8 8 0 0 1 0 16m56 80a16 16 0 1 1 16-16a16 16 0 0 1-16 16m0-96V88h34.58l9.6 24Z" />
                        </svg>
                        Book a Ride
                    </a>

                </div>

            </div>

            {{-- RIGHT SIDEBAR --}}
            <aside class="lg:col-span-4 space-y-7">

                {{-- Other Services --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                    <h3 class="text-sm font-bold text-[#0b1b3a] uppercase tracking-wide mb-5">
                        Other Services
                    </h3>

                    <div class="space-y-3">
                        @foreach($otherServices as $os)
                        <a href="{{ $os['url'] }}"
                            class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-50 transition">
                            <div class="h-12 w-12 rounded-lg overflow-hidden bg-gray-100 shrink-0">
                                <img src="{{ $os['img'] }}" class="h-full w-full object-cover" alt="">
                            </div>

                            <div class="flex-1">
                                <div class="text-sm md:text-[15px] font-semibold text-[#0b1b3a] leading-snug">
                                    {{ $os['title'] }}
                                </div>
                            </div>

                            <div class="text-gray-400 text-xl">›</div>
                        </a>
                        @endforeach
                    </div>
                </div>

                {{-- Call Us Anytime Card (match screenshot) --}}
                <div class="rounded-2xl overflow-hidden shadow-sm border border-gray-200">
                    <div class="bg-gradient-to-br from-[#0b2a5a] via-[#071b3c] to-[#00786a] text-white p-8 md:p-9">

                        {{-- top icon bubble --}}
                        <div class="h-14 w-14 rounded-full bg-white/10 flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M6.62 10.79a15 15 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.02-.24c1.12.37 2.33.56 3.57.56a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1C12.3 21 3 11.7 3 1a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.24.19 2.45.56 3.57a1 1 0 0 1-.24 1.02z" />
                            </svg>
                        </div>

                        <div class="space-y-3">
                            <div class="text-lg font-semibold text-white/90">Call Us Anytime</div>

                            <div class="text-3xl md:text-4xl font-extrabold tracking-wide">
                                (925) 501- 4813
                            </div>

                            <div class="flex items-center gap-3 text-white/90">
                                <svg xmlns="http://www.w3.org/1999/svg" class="h-5 w-5 opacity-90" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2m0 4l-8 5l-8-5V6l8 5l8-5z" />
                                </svg>

                                <span class="break-all text-sm md:text-base">
                                    HealthRideMedicalTransport@gmail.com
                                </span>
                            </div>

                            <a href="{{ route('contact-us') }}"
                                class="inline-flex items-center justify-center px-7 py-3 rounded-md bg-emerald-500 text-white text-sm md:text-base font-semibold hover:bg-emerald-600 transition mt-4">
                                Contact Us
                            </a>
                        </div>

                    </div>
                </div>


            </aside>

        </div>
    </div>
</section>

{{-- Swiper CSS/JS (if not already in your layout) --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

{{-- Swiper Init --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Swiper('.serviceGallery', {
            spaceBetween: 22,
            slidesPerView: 1,
            navigation: {
                nextEl: '.gallery-next',
                prevEl: '.gallery-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 3
                }, // show 3 like your screenshot
            },
        });
    });
</script>

<style>
    .serviceGallery .swiper-pagination {
        position: static !important;
        /* not absolute */
        margin-top: 14px;
        /* spacing below images */
        text-align: center;
    }
</style>

@endsection