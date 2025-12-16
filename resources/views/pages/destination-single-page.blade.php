@extends('layouts.app')

@section('content')

<x-banner2 title="Destination Details" background="images/destinations.png" />


{{-- AMBULATOR TRANSPORT SECTION (like screenshot) --}}
<section class="w-full bg-white py-14 md:py-20">
    <div class="max-w-screen-2xl mx-auto px-4 md:px-6 lg:px-10 space-y-10">

        {{-- Top: Text + Image --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
            <div class="lg:col-span-6">
                <h2 class="text-2xl md:text-5xl font-extrabold text-[#0b1b3a]">
                    Ambulator Transport
                </h2>

                <p class="mt-4 text-lg md:text-xl text-black leading-[1.9] tracking-wide max-w-2xl">
                    Our Ambulator Transport is designed for patients who can walk with little or no assistance but
                    still need safe, dependable transportation to and from medical appointments. Whether it’s for a
                    doctor’s visit, therapy session, or follow-up care, HealthRide ensures every ride is comfortable,
                    timely, and stress-free.
                </p>


                <a href="#"
                    class="mt-5 inline-flex items-center justify-center rounded-md bg-emerald-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-emerald-700 transition">
                    Book Now
                </a>
            </div>

            <div class="lg:col-span-6">
                <div class="rounded-2xl overflow-hidden bg-gray-100 shadow-sm border border-gray-200">
                    <img src="{{ asset('images/transportation1.png') }}"
                        alt="Ambulator transport"
                        class="w-full h-[220px] sm:h-[260px] md:h-[400px] object-cover">
                </div>
            </div>
        </div>

        {{-- WHY CHOOSE + PRICING (UNIFIED SECTION) --}}
        <div class="rounded-[32px] border border-gray-200 bg-white p-10 md:p-16 space-y-20 pb-20">

            {{-- WHY CHOOSE --}}
            <div>
                <h3 class="text-2xl md:text-4xl font-extrabold text-[#0b1b3a] mb-12">
                    Why Choose Ambulator Transport?
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

                    {{-- Card 1 --}}
                    <div class="rounded-2xl bg-gray-50 border border-gray-100 p-10 text-center">
                        <div class="mx-auto mb-8 flex h-28 w-28 items-center justify-center rounded-full bg-emerald-100">
                            <img src="{{ asset('images/green-van.png') }}"
                                class="h-15 w-15 object-contain"
                                alt="Safe Travel">
                        </div>

                        <h4 class="font-extrabold text-[#0b1b3a] text-xl md:text-2xl mb-4">
                            Safe and Supportive Travel
                        </h4>

                        <p class="text-base md:text-lg text-gray-600 leading-relaxed max-w-sm mx-auto">
                            Our vehicles are fully equipped and sanitized to ensure every passenger experiences a safe,
                            comfortable, and worry-free ride.
                        </p>
                    </div>

                    {{-- Card 2 --}}
                    <div class="rounded-2xl bg-gray-50 border border-gray-100 p-10 text-center">
                        <div class="mx-auto mb-8 flex h-28 w-28 items-center justify-center rounded-full bg-emerald-100">
                            <img src="{{ asset('images/green-check.png') }}"
                                class="h-15 w-15 object-contain"
                                alt="Professional Team">
                        </div>

                        <h4 class="font-extrabold text-[#0b1b3a] text-xl md:text-2xl mb-4">
                            Professional and Compassionate Team
                        </h4>

                        <p class="text-base md:text-lg text-gray-600 leading-relaxed max-w-sm mx-auto">
                            Drivers are trained, respectful, and healthcare-aware—treating every passenger with empathy
                            and genuine care.
                        </p>
                    </div>

                    {{-- Card 3 --}}
                    <div class="rounded-2xl bg-gray-50 border border-gray-100 p-10 text-center">
                        <div class="mx-auto mb-8 flex h-28 w-28 items-center justify-center rounded-full bg-emerald-100">
                            <img src="{{ asset('images/green-clock.png') }}"
                                class="h-15 w-15 object-contain"
                                alt="On-Time Service">
                        </div>

                        <h4 class="font-extrabold text-[#0b1b3a] text-xl md:text-2xl mb-4">
                            Reliable, On-Time Service
                        </h4>

                        <p class="text-base md:text-lg text-gray-600 leading-relaxed max-w-sm mx-auto">
                            We value your time. With real-time coordination and punctual scheduling, HealthRide helps you
                            arrive exactly when you need to.
                        </p>
                    </div>

                </div>
            </div>

            {{-- PRICING --}}
            <div>
                <h3 class="text-2xl md:text-4xl font-extrabold text-[#0b1b3a] mb-12">
                    Flexible Options to Match Your Needs
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

                    {{-- Price 1 --}}
                    <div class="rounded-2xl border border-gray-200 bg-white p-10 text-center shadow-sm">
                        <div class="text-emerald-700 font-extrabold text-5xl mb-2">
                            <span class="text-xl align-top">$</span>65
                        </div>

                        <div class="uppercase tracking-wide text-gray-500 font-semibold text-sm mb-3">
                            one-way
                        </div>

                        <div class="text-lg text-gray-600 mb-8">
                            Local (within 10 miles)
                        </div>

                        <a href="#"
                            class="inline-flex w-full items-center justify-center rounded-lg
                          bg-emerald-600 px-6 py-4 text-lg font-semibold
                          text-white hover:bg-emerald-700 transition">
                            Get Quote
                        </a>
                    </div>

                    {{-- Price 2 --}}
                    <div class="rounded-2xl border border-gray-200 bg-white p-10 text-center shadow-sm">
                        <div class="text-emerald-700 font-extrabold text-5xl mb-2">
                            <span class="text-xl align-top">$</span>75
                        </div>

                        <div class="uppercase tracking-wide text-gray-500 font-semibold text-sm mb-3">
                            one-way
                        </div>

                        <div class="text-lg text-gray-600 mb-8">
                            Extended (within 11–20 miles)
                        </div>

                        <a href="#"
                            class="inline-flex w-full items-center justify-center rounded-lg
                          bg-emerald-600 px-6 py-4 text-lg font-semibold
                          text-white hover:bg-emerald-700 transition">
                            Get Quote
                        </a>
                    </div>

                    {{-- Price 3 --}}
                    <div class="rounded-2xl border border-gray-200 bg-white p-10 text-center shadow-sm">
                        <div class="text-emerald-700 font-extrabold text-5xl mb-2">
                            <span class="text-xl align-top">$</span>?
                        </div>

                        <div class="uppercase tracking-wide text-gray-500 font-semibold text-sm mb-3">
                            custom quote
                        </div>

                        <div class="text-lg text-gray-600 mb-8">
                            Over 20 miles
                        </div>

                        <a href="#"
                            class="inline-flex w-full items-center justify-center rounded-lg
                          bg-emerald-600 px-6 py-4 text-lg font-semibold
                          text-white hover:bg-emerald-700 transition">
                            Get Quote
                        </a>
                    </div>

                </div>
            </div>

        </div>

        <x-review-slider
            :reviews="$reviews"
            badge="Client Reviews"
            title="What Our Passengers Say" />
    </div>

</section>

@endsection