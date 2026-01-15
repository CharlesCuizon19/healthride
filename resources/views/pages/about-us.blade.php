@extends('layouts.app')

@section('page-title', 'About Us')
@section('content')

{{-- Top banner --}}
<x-banner2 title="About Us" background="images/about-us.png" />

{{-- Who We Are section --}}
<section class="bg-white py-14 md:py-20">
    <div class="max-w-screen-2xl mx-auto px-4 lg:px-0 flex flex-col lg:flex-row items-center gap-10 lg:gap-14">

        {{-- LEFT: image collage --}}
        <div class="w-full lg:w-[50%]">
            <div class="relative">
                <div class="overflow-hidden rounded-xl lg:rounded-2xl">
                    <img src="{{ asset('images/who-we-are.png') }}"
                        alt="Nurses assisting a patient"
                        class="w-full h-auto max-h-[420px] md:max-h-[500px] lg:max-h-[550px] object-cover">
                </div>
            </div>
        </div>

        {{-- RIGHT: text content --}}
        <div class="w-full lg:w-[55%] lg:-mt-[10rem] xl:-mt-[15rem]">
            <div class="inline-flex items-center px-4 md:px-5 py-1 mb-4 rounded-full border border-emerald-500/30 text-base md:text-lg font-semibold tracking-wide text-emerald-700 bg-white">
                Who We Are
            </div>

            <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-[#071434] mb-4 leading-tight">
                Driven by Care, Guided by<br class="hidden md:block"> Compassion
            </h2>

            <p class="text-black text-sm md:text-base lg:text-xl leading-relaxed mb-4">
                HealthRide Medical Transport LLC is a licensed non-emergency medical transportation
                provider based in Pittsburg, California. We provide wheelchair-accessible and ambulatory
                rides for seniors, patients, and individuals with disabilities who need safe, comfortable, and
                dependable transport to and from medical appointments, dialysis treatments, hospitals, or
                rehabilitation centers. Managed by a licensed nurse, every trip is guided by compassion,
                professionalism, and trust.
            </p>

            {{-- gradient “Quality & Excellence” bar --}}
            <div
                class="mt-6 md:mt-8 rounded-xl bg-gradient-to-r from-[#071434] via-[#0b2b5a] to-[#deeff2] px-4 md:px-5 py-3 md:py-5 text-white shadow-xl">
                <div class="flex items-center gap-4">
                    <div class="flex items-center overflow-hidden">
                        <img src="{{ asset('images/award-icon.png') }}"
                            alt="Quality Icon"
                            class="w-10 h-10 md:w-14 md:h-14 object-contain">
                    </div>

                    <div class="flex flex-col">
                        <span class="text-lg md:text-2xl lg:text-4xl font-semibold">
                            Quality &amp; Excellence
                        </span>
                        <span class="text-xs md:text-sm text-white/80">
                            Dedicated to delivering consistent, reliable non-emergency medical transport.
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Nurse / clinical oversight --}}
<section class="w-full px-4 md:px-6 lg:px-0">
    <div class="relative max-w-screen-2xl mx-auto">

        {{-- Mint card image as background --}}
        <div class="rounded-2xl px-5 md:px-10 lg:px-14 py-10 md:py-16 lg:py-20 bg-contain bg-no-repeat bg-top md:h-auto lg:h-[480px]"
            style="background-image: url('{{ asset('images/mint-card.png') }}');">

            <div class="grid grid-cols-1 lg:grid-cols-[120px_1fr_320px] xl:grid-cols-[120px_1fr_380px] items-center gap-6 md:gap-10">
                <div class="hidden lg:block"></div>

                {{-- TEXT --}}
                <div class="mt-40 md:mt-10 lg:mt-0">
                    <h2 class="text-2xl md:text-3xl lg:text-4xl font-extrabold text-[#04284A] mb-3">
                        Licensed Vocational Nurse – Clinical Oversight
                    </h2>

                    <p class="text-[#04284A] text-sm md:text-base lg:text-xl leading-relaxed mb-4">
                        With professional supervision and medical insight, we maintain the highest level of readiness
                        for our passengers—especially those with unique health needs. This oversight ensures that our
                        drivers are trained, our procedures are consistent, and every ride supports both comfort and
                        clinical safety.
                    </p>

                    <ul class="text-[#04284A] text-sm md:text-base lg:text-lg space-y-1">
                        <li>• Clinical guidance for patient safety and comfort</li>
                        <li>• Staff training led by a licensed healthcare professional</li>
                        <li>• Ongoing review of care and transport protocols</li>
                    </ul>
                </div>

                <div class="hidden lg:block"></div>
            </div>
        </div>

        {{-- NURSE overlay (desktop only) --}}
        <div class="pointer-events-none absolute right-0 -top-10 md:-top-[6rem] lg:-top-[10rem] hidden md:block">
            <div class="relative w-[260px] md:w-[320px] lg:w-[360px] h-[260px] md:h-[320px] lg:h-[660px]">
                <img src="{{ asset('images/nurse.png') }}"
                    class="relative z-10 h-full object-contain"
                    alt="nurse">
            </div>
        </div>
    </div>
</section>

{{-- Stats band --}}
<section class="w-full mt-10 md:mt-16">
    <div class="bg-gradient-to-r from-[#001739] via-[#007c70] to-[#001739]">
        <div class="max-w-screen-2xl mx-auto px-4 md:px-6 lg:px-10 py-10 md:py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-10 lg:gap-16 text-center text-white">

                {{-- Stat 1 --}}
                <div class="space-y-3 md:space-y-4">
                    <div class="text-4xl md:text-5xl lg:text-7xl font-extrabold">
                        98%
                    </div>
                    <div class="text-lg md:text-xl lg:text-2xl">
                        On-Time Arrivals
                    </div>
                    <div class="flex justify-center">
                        <img src="{{ asset('images/van-icon.png') }}"
                            alt="On-time icon"
                            class="w-10 h-10 md:w-12 md:h-12 object-contain">
                    </div>
                </div>

                {{-- Stat 2 --}}
                <div class="space-y-3 md:space-y-4">
                    <div class="text-4xl md:text-5xl lg:text-7xl font-extrabold">
                        4000+
                    </div>
                    <div class="text-lg md:text-xl lg:text-2xl">
                        Safe Rides Completed
                    </div>
                    <div class="flex justify-center">
                        <img src="{{ asset('images/safety-icon.png') }}"
                            alt="Safety icon"
                            class="w-10 h-10 md:w-12 md:h-12 object-contain">
                    </div>
                </div>

                {{-- Stat 3 --}}
                <div class="space-y-3 md:space-y-4">
                    <div class="text-4xl md:text-5xl lg:text-7xl font-extrabold">
                        24/7
                    </div>
                    <div class="text-lg md:text-xl lg:text-2xl">
                        Always Available
                    </div>
                    <div class="flex justify-center">
                        <img src="{{ asset('images/clock-icon.png') }}"
                            alt="Clock icon"
                            class="w-10 h-10 md:w-12 md:h-12 object-contain">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Mission & Vision --}}
<section class="w-full py-16 md:py-20 bg-white">
    <div class="max-w-screen-2xl mx-auto px-4 md:px-6 lg:px-10">

        <div class="flex justify-center mb-6">
            <span class="px-5 md:px-6 py-1 border border-emerald-600 text-emerald-700 rounded-full font-medium text-sm md:text-base">
                Mission & Vision
            </span>
        </div>

        <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-center text-[#071434] leading-tight mb-10 md:mb-16 lg:mb-20">
            A Future Built on Care and<br class="hidden md:block">Connection
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-10">

            {{-- Mission Card --}}
            <div class="relative rounded-2xl bg-cover bg-center p-6 md:p-8 lg:p-10"
                style="background-image: url('{{ asset('images/core-values-card.png') }}');">
                <div class="absolute -top-8 md:-top-10 left-1/2 -translate-x-1/2">
                    <div class="w-16 h-16 md:w-20 md:h-20 bg-[#071434] rounded-full flex items-center justify-center">
                        <img src="/images/mission.png" class="w-8 h-8 md:w-10 md:h-10" alt="">
                    </div>
                </div>

                <div class="absolute inset-0 opacity-[0.07] pointer-events-none bg-[url('/images/pattern-plus.png')] bg-repeat"></div>

                <h3 class="text-2xl md:text-3xl lg:text-4xl font-semibold text-center text-[#071434] mt-10 md:mt-14 mb-4 relative z-10">
                    Our Mission
                </h3>

                <p class="text-[#071434] text-sm md:text-base lg:text-xl leading-relaxed relative z-10">
                    At HealthRide Medical Transport LLC, our mission is to provide safe, reliable, and
                    compassionate non-emergency medical transportation. We are committed to supporting
                    patients, families, and healthcare facilities by ensuring every ride is on time, every client
                    is treated with dignity, and every journey promotes health and independence.
                </p>
            </div>

            {{-- Vision Card --}}
            <div class="relative rounded-2xl bg-cover bg-center p-6 md:p-8 lg:p-10"
                style="background-image: url('{{ asset('images/core-values-card.png') }}');">
                <div class="absolute -top-8 md:-top-10 left-1/2 -translate-x-1/2">
                    <div class="w-16 h-16 md:w-20 md:h-20 bg-[#071434] rounded-full flex items-center justify-center">
                        <img src="/images/vision.png" class="w-8 h-8 md:w-10 md:h-10" alt="">
                    </div>
                </div>

                <div class="absolute inset-0 opacity-[0.07] pointer-events-none bg-[url('/images/pattern-plus.png')] bg-repeat"></div>

                <h3 class="text-2xl md:text-3xl lg:text-4xl font-semibold text-center text-[#071434] mt-10 md:mt-14 mb-4 relative z-10">
                    Our Vision
                </h3>

                <p class="text-[#071434] text-sm md:text-base lg:text-xl leading-relaxed relative z-10">
                    Our vision is to become the most trusted and caring transportation partner in Contra Costa
                    County and beyond — reducing barriers to healthcare, connecting patients to essential
                    services, and growing into a multi-vehicle company that serves our community with
                    excellence, compassion, and professionalism.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- Hero band with overlapping image --}}
<section class="w-full pt-14 md:pt-20">
    <div class="relative w-full bg-cover bg-center bg-no-repeat"
        style="background-image: url('{{ asset('images/homepage-rectangle.png') }}');">
        <div class="max-w-screen-2xl mx-auto px-4 md:px-6 lg:px-10 py-12 md:py-16 lg:py-14 flex flex-col lg:flex-row items-center">

            {{-- LEFT: Text --}}
            <div class="w-full lg:w-1/2 text-white space-y-5 md:space-y-6 z-10">
                <h1 class="text-2xl md:text-3xl lg:text-5xl font-extrabold leading-tight">
                    Helping You Get There with<br class="hidden md:block">
                    Dignity and Care
                </h1>

                <p class="text-sm md:text-base lg:text-lg leading-relaxed w-full">
                    HealthRide Medical Transport provides professional, caring assistance for every medical
                    visit — so you or your loved one can travel confidently and comfortably.
                </p>

                <div class="pt-2 md:pt-4">
                    <a href="#"
                        class="inline-flex items-center justify-center px-6 md:px-8 py-3 rounded-md bg-white text-[#017466] font-semibold text-sm md:text-base shadow-md hover:bg-slate-100 transition">
                        Book a Ride with Us
                    </a>
                </div>
            </div>

            {{-- RIGHT: Person image --}}
            <div class="w-full lg:w-1/2 relative mt-8 lg:mt-0">
                <div class="relative lg:absolute lg:-right-10 xl:-right-20 lg:-top-32 xl:-top-[20rem] flex justify-center lg:justify-end">
                    <img src="{{ asset('images/elder.png') }}"
                        alt="Nurse assisting patient in wheelchair"
                        class="relative z-20 h-[220px] md:h-[300px] lg:h-[480px] xl:h-[510px] object-contain">
                </div>
            </div>
        </div>

        <div class="pointer-events-none absolute inset-0 opacity-40 bg-[url('{{ asset('images/hero-waves.png') }}')] bg-cover bg-center"></div>
    </div>
</section>

{{-- Core Values --}}
<section class="w-full bg-[#f9f9f9] pt-16 md:pt-20 pb-40 md:pb-40">
    <div class="max-w-screen-2xl mx-auto px-4 md:px-6 lg:px-10">

        <div class="flex justify-center mb-6">
            <span class="px-5 md:px-6 py-1 rounded-full border border-emerald-600/40 text-emerald-700 text-sm md:text-base font-semibold">
                Core Values
            </span>
        </div>

        <h2 class="text-2xl md:text-3xl lg:text-5xl font-bold text-center text-[#071434] leading-tight mb-10 md:mb-12">
            Committed to Safe and Dignified<br class="hidden md:block">
            Transport
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 md:gap-8">
            {{-- Card 1 --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 px-6 md:px-8 py-8 md:py-10 text-center">
                <div class="flex justify-center mb-6">
                    <div class="w-16 h-16 md:w-20 md:h-20 rounded-full bg-[#0A8B6C] flex items-center justify-center">
                        <img src="{{ asset('images/compassion-icon.png') }}" alt="Compassion icon"
                            class="w-8 h-8 md:w-10 md:h-10 object-contain">
                    </div>
                </div>
                <h3 class="text-xl md:text-2xl font-bold text-[#071434] mb-3">
                    Compassion
                </h3>
                <p class="text-sm md:text-base text-gray-600">
                    Every client is treated like family.
                </p>
            </div>

            {{-- Card 2 --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 px-6 md:px-8 py-8 md:py-10 text-center">
                <div class="flex justify-center mb-6">
                    <div class="w-16 h-16 md:w-20 md:h-20 rounded-full bg-[#0A8B6C] flex items-center justify-center">
                        <img src="{{ asset('images/award-icon.png') }}" alt="Reliability icon"
                            class="w-8 h-8 md:w-10 md:h-10 object-contain">
                    </div>
                </div>
                <h3 class="text-xl md:text-2xl font-bold text-[#071434] mb-3">
                    Reliability
                </h3>
                <p class="text-sm md:text-base text-gray-600">
                    On-time, every time.
                </p>
            </div>

            {{-- Card 3 --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 px-6 md:px-8 py-8 md:py-10 text-center">
                <div class="flex justify-center mb-6">
                    <div class="w-16 h-16 md:w-20 md:h-20 rounded-full bg-[#0A8B6C] flex items-center justify-center">
                        <img src="{{ asset('images/safety-icon.png') }}" alt="Safety icon"
                            class="w-8 h-8 md:w-10 md:h-10 object-contain">
                    </div>
                </div>
                <h3 class="text-xl md:text-2xl font-bold text-[#071434] mb-3">
                    Safety
                </h3>
                <p class="text-sm md:text-base text-gray-600">
                    ADA-compliant vehicles and trained drivers.
                </p>
            </div>

            {{-- Card 4 --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 px-6 md:px-8 py-8 md:py-10 text-center">
                <div class="flex justify-center mb-6">
                    <div class="w-16 h-16 md:w-20 md:h-20 rounded-full bg-[#0A8B6C] flex items-center justify-center">
                        <img src="{{ asset('images/integrity-icon.png') }}" alt="Integrity icon"
                            class="w-8 h-8 md:w-10 md:h-10 object-contain">
                    </div>
                </div>
                <h3 class="text-xl md:text-2xl font-bold text-[#071434] mb-3">
                    Integrity
                </h3>
                <p class="text-sm md:text-base text-gray-600">
                    Transparent communication and professional service.
                </p>
            </div>
        </div>
    </div>
</section>

@endsection