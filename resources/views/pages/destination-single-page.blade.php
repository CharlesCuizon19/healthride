@extends('layouts.app')

@section('content')

{{-- Banner --}}
<x-banner2 title="{{ $destination->title }}" background="images/destinations.png" />

{{-- Destination Section --}}
<section class="w-full bg-white pb-40 md:pb-40 pt-24 md:pt-24">
    <div class="max-w-screen-2xl mx-auto px-4 md:px-6 lg:px-10 space-y-10">

        {{-- Top: Text + Image --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
            <div class="lg:col-span-6">
                <h2 class="text-2xl md:text-5xl font-extrabold text-[#0b1b3a]">
                    {{ $destination->title }}
                </h2>

                <p class="mt-4 text-lg md:text-xl text-black leading-[1.9] tracking-wide max-w-2xl">
                    {{ $destination->description }}
                </p>

                @if(!empty($destination->button_url))
                <a href="{{ $destination->button_url }}"
                    class="mt-5 inline-flex items-center justify-center rounded-md bg-emerald-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-emerald-700 transition">
                    {{ $destination->button_label }}
                </a>
                @endif
            </div>

            <div class="lg:col-span-6">
                <div class="rounded-2xl overflow-hidden bg-gray-100 shadow-sm border border-gray-200">
                    <img src="{{ $destination->image }}"
                        alt="{{ $destination->title }}"
                        class="w-full h-[220px] sm:h-[260px] md:h-[400px] object-cover">
                </div>
            </div>
        </div>

        {{-- Why Choose + Pricing --}}
        <div class="rounded-[32px] border border-gray-200 bg-white p-10 md:p-16 space-y-20 pb-20">

            {{-- Why Choose --}}
            <div>
                <h3 class="text-2xl md:text-4xl font-extrabold text-[#0b1b3a] mb-12">
                    Why Choose {{ $destination->title }}?
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    {{-- Cards example - you can customize these for each destination --}}
                    <div class="rounded-2xl bg-gray-50 border border-gray-100 p-10 text-center">
                        <div class="mx-auto mb-8 flex h-28 w-28 items-center justify-center rounded-full bg-emerald-100">
                            <img src="{{ asset('images/green-van.png') }}" class="h-15 w-15 object-contain" alt="Safe Travel">
                        </div>

                        <h4 class="font-extrabold text-[#0b1b3a] text-xl md:text-2xl mb-4">Safe and Supportive Travel</h4>

                        <p class="text-base md:text-lg text-gray-600 leading-relaxed max-w-sm mx-auto">
                            Our vehicles are fully equipped and sanitized to ensure every passenger experiences a safe, comfortable, and worry-free ride.
                        </p>
                    </div>

                    <div class="rounded-2xl bg-gray-50 border border-gray-100 p-10 text-center">
                        <div class="mx-auto mb-8 flex h-28 w-28 items-center justify-center rounded-full bg-emerald-100">
                            <img src="{{ asset('images/green-check.png') }}" class="h-15 w-15 object-contain" alt="Professional Team">
                        </div>

                        <h4 class="font-extrabold text-[#0b1b3a] text-xl md:text-2xl mb-4">Professional and Compassionate Team</h4>

                        <p class="text-base md:text-lg text-gray-600 leading-relaxed max-w-sm mx-auto">
                            Drivers are trained, respectful, and healthcare-aware—treating every passenger with empathy and genuine care.
                        </p>
                    </div>

                    <div class="rounded-2xl bg-gray-50 border border-gray-100 p-10 text-center">
                        <div class="mx-auto mb-8 flex h-28 w-28 items-center justify-center rounded-full bg-emerald-100">
                            <img src="{{ asset('images/green-clock.png') }}" class="h-15 w-15 object-contain" alt="On-Time Service">
                        </div>

                        <h4 class="font-extrabold text-[#0b1b3a] text-xl md:text-2xl mb-4">Reliable, On-Time Service</h4>

                        <p class="text-base md:text-lg text-gray-600 leading-relaxed max-w-sm mx-auto">
                            We value your time. With real-time coordination and punctual scheduling, HealthRide helps you arrive exactly when you need to.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Pricing --}}
            <div>
                <h3 class="text-2xl md:text-4xl font-extrabold text-[#0b1b3a] mb-12">
                    Flexible Options to Match Your Needs
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    @foreach($destination->rows as $row)
                    <div class="rounded-2xl border border-gray-200 bg-white p-10 text-center shadow-sm">
                        <div class="text-emerald-700 font-extrabold text-5xl mb-2">
                            @if(is_numeric(str_replace('$','',$row['price'])))
                            <span class="text-xl align-top">$</span>{{ str_replace('$','',$row['price']) }}
                            @else
                            <span class="text-xl align-top">$</span>?
                            @endif
                        </div>

                        <div class="uppercase tracking-wide text-gray-500 font-semibold text-sm mb-3">
                            {{ $row['suffix'] ?: $row['price'] }}
                        </div>

                        <div class="text-lg text-gray-600 mb-8">
                            {{ $row['label'] }}
                        </div>

                        <a href="#"
                            class="inline-flex w-full items-center justify-center rounded-lg bg-emerald-600 px-6 py-4 text-lg font-semibold text-white hover:bg-emerald-700 transition">
                            Get Quote
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>

        {{-- Reviews Slider --}}
        <x-review-slider :reviews="$reviews" badge="Client Reviews" title="What Our Passengers Say" />

    </div>
</section>

@endsection