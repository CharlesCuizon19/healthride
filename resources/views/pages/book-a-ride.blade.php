@extends('layouts.app')

@section('page-title', 'Book a Ride')

@section('content')

<x-banner2 title="Book a Ride" background="images/banner-ride.png" />

{{-- BOOKING LAYOUT (matches screenshot style) --}}
<section class="bg-white pt-10 md:pt-14 pb-32 md:pb-32">
    <div class="max-w-screen-2xl mx-auto px-4">

        {{-- ✅ WRAPPER (header + card) --}}
        <div class="relative">

            {{-- ✅ Top Header Row --}}
            <div class="flex items-start justify-between gap-8">
                <div class="max-w-2xl">
                    <div
                        class="inline-flex items-center px-6 py-2 rounded-full border border-emerald-600/50 text-sm font-semibold tracking-wide text-emerald-700 bg-white">
                        Book Now
                    </div>

                    <h2 class="mt-5 text-[#071434] text-4xl md:text-4xl font-extrabold leading-tight">
                        Simple, Secure, and Fast Booking
                    </h2>

                    <p class="mt-3 text-gray-600 text-base md:text-lg leading-relaxed">
                        Fill out your ride details. We will confirm your request and send you a secure payment link.
                    </p>
                </div>

                {{-- ✅ Van (overlaps the Step 1 card) --}}
                <img
                    src="{{ asset('images/homepage-car.png') }}"
                    alt="Van"
                    class="hidden md:block absolute right-0 top-0 md:top-2
                           w-[380px] lg:w-[520px]
                           drop-shadow-[0_28px_40px_rgba(0,0,0,0.18)]
                           z-20 pointer-events-none select-none" />
            </div>

            {{-- ✅ Main Form Card --}}
            <div class="mt-12 md:mt-10 rounded-2xl border border-gray-200 bg-white shadow-sm overflow-hidden relative z-10">

                {{-- STEP 1 --}}
                <div class="px-6 md:px-8 py-6">

                    {{-- ✅ BIG HEADER + IMAGE (like your screenshot) --}}
                    <div class="flex items-start gap-4 mb-6">

                        <!-- Icon -->
                        <div class="flex h-10 w-10 items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 256 256"
                                class="h-15 w-15 text-[#071434]">
                                <path fill="currentColor"
                                    d="m255.43 117l-14-35a15.93 15.93 0 0 0-14.85-10H192v-8a8 8 0 0 0-8-8H32a16 16 0 0 0-16 16v112a16 16 0 0 0 16 16h17a32 32 0 0 0 62 0h50a32 32 0 0 0 62 0h17a16 16 0 0 0 16-16v-64a7.9 7.9 0 0 0-.57-3M80 208a16 16 0 1 1 16-16a16 16 0 0 1-16 16m56-80h-16v16a8 8 0 0 1-16 0v-16H88a8 8 0 0 1 0-16h16V96a8 8 0 0 1 16 0v16h16a8 8 0 0 1 0 16m56 80a16 16 0 1 1 16-16a16 16 0 0 1-16 16m0-96V88h34.58l9.6 24Z" />
                            </svg>
                        </div>

                        <!-- Title + Description -->
                        <div>
                            <h3 class="text-2xl md:text-3xl font-extrabold text-[#071434] leading-tight">
                                Step 1 – Ride Details
                            </h3>

                            <p class="mt-1 text-sm md:text-base text-gray-600 max-w-3xl">
                                Provide your trip details so we can arrange the safest and most convenient transport for you.
                            </p>
                        </div>

                    </div>


                    {{-- ✅ TOP FIELDS (3 columns like screenshot) --}}
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4">

                        {{-- Type of Booking --}}
                        <div class="md:col-span-4">
                            <label class="block text-sm font-semibold text-[#071434]">Type of Booking</label>
                            <select
                                class="mt-2 w-full rounded-lg border-gray-300 text-base md:text-lg py-3 px-4
                       focus:border-emerald-600 focus:ring-emerald-600">
                                <option>Ambulator Transport</option>
                                <option>Wheelchair Transport</option>
                                <option>Special Services</option>
                            </select>
                        </div>

                        {{-- Booking Option --}}
                        <div class="md:col-span-4">
                            <label class="block text-sm font-semibold text-[#071434]">Booking Option</label>
                            <select
                                class="mt-2 w-full rounded-lg border-gray-300 text-base md:text-lg py-3 px-4
                       focus:border-emerald-600 focus:ring-emerald-600">
                                <option>Over 20 miles (custom quote)</option>
                                <option>0 - 10 miles</option>
                                <option>11 - 20 miles</option>
                            </select>
                        </div>

                        {{-- Booking Date & Time --}}
                        <div class="md:col-span-4">
                            <label class="block text-sm font-semibold text-[#071434]">Booking Date &amp; Time</label>
                            <div class="relative mt-2">
                                <input type="date"
                                    class="w-full rounded-lg border-gray-300 text-base md:text-lg py-3 px-4 pr-12
                           focus:border-emerald-600 focus:ring-emerald-600">
                                {{-- calendar icon --}}
                                <span class="pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 text-[#071434]">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor">
                                        <path
                                            d="M7 2a1 1 0 0 1 1 1v1h8V3a1 1 0 1 1 2 0v1h1a3 3 0 0 1 3 3v13a3 3 0 0 1-3 3H4a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h1V3a1 1 0 0 1 1-1Zm14 8H3v10a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V10ZM4 6a1 1 0 0 0-1 1v1h18V7a1 1 0 0 0-1-1H4Z" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- ✅ MAP / LOCATION CARD --}}
                    <div class="mt-6 rounded-2xl bg-gray-50 border border-gray-200 p-5 md:p-6">

                        <div class="flex items-center gap-3 mb-2">
                            <div class="h-10 w-10 rounded-full bg-white border border-gray-200 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 text-[#071434]"
                                    fill="currentColor">
                                    <path
                                        d="M12 2a7 7 0 0 0-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 0 0-7-7Zm0 9.5A2.5 2.5 0 1 1 14.5 9 2.5 2.5 0 0 1 12 11.5Z" />
                                </svg>
                            </div>

                            <div>
                                <div class="text-lg font-extrabold text-[#071434] uppercase tracking-wide">California</div>
                                <div class="text-lg text-gray-600">
                                    Pin your desired pick-up &amp; drop-off location (over 20 miles).
                                </div>
                            </div>
                        </div>

                        {{-- map box --}}
                        <div class="mt-4 rounded-xl border border-emerald-600/60 overflow-hidden bg-white">
                            <div class="h-56 md:h-72 flex items-center justify-center text-gray-500 text-sm">
                                Map Preview
                            </div>
                        </div>

                        {{-- checkbox under map --}}
                        <label class="mt-4 flex items-center gap-2 text-lg text-gray-700">
                            <input type="checkbox" class="rounded border-gray-300 text-emerald-600 focus:ring-emerald-600">
                            Use my current location as my pick-up address
                        </label>
                    </div>

                    {{-- ✅ PICKUP / DROPOFF (textarea like screenshot) --}}
                    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xl font-semibold text-[#071434]">Pick-up Address</label>
                            <textarea rows="3" placeholder="Enter your address"
                                class="mt-2 w-full rounded-lg border-gray-300 text-base py-3 px-4
                       focus:border-emerald-600 focus:ring-emerald-600"></textarea>
                        </div>

                        <div>
                            <label class="block text-xl font-semibold text-[#071434]">Drop-off Address</label>
                            <textarea rows="3" placeholder="Enter your address"
                                class="mt-2 w-full rounded-lg border-gray-300 text-base py-3 px-4
                       focus:border-emerald-600 focus:ring-emerald-600"></textarea>
                        </div>
                    </div>

                    {{-- ✅ OPTIONS (ALL STACKED – matches screenshot exactly) --}}
                    <div class="mt-8 space-y-10">

                        {{-- Round Trip --}}
                        <div>
                            <div class="text-xl font-extrabold text-[#071434] mb-3">Round-Trip</div>
                            <div class="space-y-2">
                                <label class="flex items-center gap-3 text-base text-gray-700">
                                    <input type="radio" name="round_trip"
                                        class="text-emerald-600 focus:ring-emerald-600" checked>
                                    Yes, I would like to.
                                </label>
                                <label class="flex items-center gap-3 text-base text-gray-700">
                                    <input type="radio" name="round_trip"
                                        class="text-emerald-600 focus:ring-emerald-600">
                                    No, thank you.
                                </label>
                            </div>
                        </div>

                        {{-- Waiting Time --}}
                        <div>
                            <div class="text-xl font-extrabold text-[#071434] mb-3">
                                Waiting Time (10-min grace)
                            </div>
                            <div class="space-y-2">
                                <label class="flex items-center gap-3 text-base text-gray-700">
                                    <input type="radio" name="waiting_time"
                                        class="text-emerald-600 focus:ring-emerald-600" checked>
                                    Yes, I would like to.
                                </label>
                                <label class="flex items-center gap-3 text-base text-gray-700">
                                    <input type="radio" name="waiting_time"
                                        class="text-emerald-600 focus:ring-emerald-600">
                                    No, thank you.
                                </label>
                            </div>
                        </div>

                        {{-- Type of Service --}}
                        <div>
                            <div class="text-xl font-extrabold text-[#071434] mb-3">Type of Service</div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-3 gap-x-12">

                                <label class="flex items-center gap-3 text-base text-gray-700">
                                    <input type="radio" name="service_type"
                                        class="text-emerald-600 focus:ring-emerald-600" checked>
                                    Dialysis Transportation
                                </label>

                                <label class="flex items-center gap-3 text-base text-gray-700">
                                    <input type="radio" name="service_type"
                                        class="text-emerald-600 focus:ring-emerald-600">
                                    Pharmacy / Lab / Errands
                                </label>

                                <label class="flex items-center gap-3 text-base text-gray-700">
                                    <input type="radio" name="service_type"
                                        class="text-emerald-600 focus:ring-emerald-600">
                                    Doctor & Specialist Appointments
                                </label>

                                <label class="flex items-center gap-3 text-base text-gray-700">
                                    <input type="radio" name="service_type"
                                        class="text-emerald-600 focus:ring-emerald-600">
                                    Assisted Living & Skilled Nursing Transfers
                                </label>

                                <label class="flex items-center gap-3 text-base text-gray-700">
                                    <input type="radio" name="service_type"
                                        class="text-emerald-600 focus:ring-emerald-600">
                                    Pharmacy / Lab / Errands
                                </label>

                                <label class="flex items-center gap-3 text-base text-gray-700">
                                    <input type="radio" name="service_type"
                                        class="text-emerald-600 focus:ring-emerald-600">
                                    Wheelchair Accessible Van
                                </label>

                                <label class="flex items-center gap-3 text-base text-gray-700">
                                    <input type="radio"
                                        name="service_type"
                                        class="text-emerald-600 focus:ring-emerald-600">

                                    <span>Other (please specify):</span>

                                    <input type="text"
                                        class="w-72 border-0 border-b border-gray-400 bg-transparent
                  text-sm focus:border-emerald-600 focus:ring-0 focus:outline-none">
                                </label>
                            </div>
                        </div>

                        {{-- Add-ons --}}
                        <div>
                            <div class="text-xl font-extrabold text-[#071434] mb-3">Add-ons</div>

                            <div class="space-y-2">
                                <label class="flex items-center gap-3 text-base text-gray-700">
                                    <input type="checkbox"
                                        class="rounded border-gray-300 text-emerald-600 focus:ring-emerald-600">
                                    Wheelchair <span class="text-emerald-700 font-semibold">+$15</span>
                                </label>

                                <label class="flex items-center gap-3 text-base text-gray-700">
                                    <input type="checkbox"
                                        class="rounded border-gray-300 text-emerald-600 focus:ring-emerald-600">
                                    Stairs Assistance <span class="text-emerald-700 font-semibold">+$20</span>
                                </label>

                                <label class="flex items-center gap-3 text-base text-gray-700">
                                    <input type="checkbox"
                                        class="rounded border-gray-300 text-emerald-600 focus:ring-emerald-600">
                                    Caregiver / Nurse Ride-Along Assistance
                                    <span class="text-emerald-700 font-semibold">+$25</span>
                                </label>

                                <label class="flex items-center gap-3 text-base text-gray-700">
                                    <input type="checkbox"
                                        class="rounded border-gray-300 text-emerald-600 focus:ring-emerald-600">
                                    After Hours / Weekend
                                    <span class="text-emerald-700 font-semibold">+$20</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="h-px bg-gray-200"></div>

                {{-- ================= STEP 2 ================= --}}
                <div class="px-6 md:px-8 py-8">

                    {{-- Header --}}
                    <div class="flex items-center gap-3 mb-6">
                        <img
                            src="{{ asset('images/wallet-icon.png') }}"
                            alt="Payment Icon"
                            class="h-10 w-10 object-contain">

                        <h3 class="text-2xl md:text-3xl font-extrabold text-[#071434]">
                            Step 2 – Confirm Rate &amp; Select Payment
                        </h3>
                    </div>


                    {{-- Estimated Payment --}}
                    <div class="text-lg font-extrabold text-[#071434] mb-4">
                        Estimated Payment
                    </div>

                    <div class="rounded-2xl border border-gray-200 overflow-hidden text-base">

                        {{-- Service Row --}}
                        <div class="px-6 py-4 flex justify-between font-semibold bg-gray-50">
                            <span>Ambulator Transport</span>
                            <span class="text-gray-600">Over 20 miles (custom quote)</span>
                        </div>

                        {{-- Base Fee --}}
                        <div class="px-6 py-4 flex justify-between border-t">
                            <span>Base Fee ($)</span>
                            <span class="font-bold">$65.00</span>
                        </div>

                        {{-- Mileage --}}
                        <div class="px-6 py-4 border-t space-y-2">
                            <div class="flex justify-between">
                                <span>Mileage</span>
                                <span>28</span>
                            </div>
                            <div class="flex justify-between text-gray-600">
                                <span>Rate per mile</span>
                                <span>x $3.00</span>
                            </div>
                            <div class="flex justify-between font-bold">
                                <span>Total for Mileage</span>
                                <span>$84.00</span>
                            </div>
                        </div>

                        {{-- Add-ons --}}
                        <div class="px-6 py-4 border-t space-y-2">
                            <div class="text-gray-500 font-semibold mb-1">Add-ons</div>
                            <div class="flex justify-between">
                                <span>Wheelchair ($)</span>
                                <span>$15.00</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Stairs Assistance ($)</span>
                                <span>$20.00</span>
                            </div>
                            <div class="flex justify-between font-bold">
                                <span>Total for Add-on</span>
                                <span>$35.00</span>
                            </div>
                        </div>

                        {{-- Summary --}}
                        <div class="px-6 py-4 border-t space-y-2 bg-gray-50">
                            <div class="flex justify-between">
                                <span>Base Fee</span>
                                <span>$65.00</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Total for Mileage</span>
                                <span>$84.00</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Total for Add-on</span>
                                <span>$35.00</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Waiting Time (10-min grace)</span>
                                <span>x $1.25</span>
                            </div>
                            <div class="flex justify-between text-lg font-extrabold pt-2">
                                <span>Total</span>
                                <span>$230.00</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Round-Trip</span>
                                <span>x 2</span>
                            </div>
                        </div>

                        {{-- Grand Total --}}
                        <div class="px-6 py-5 flex justify-between bg-emerald-50 text-emerald-700 text-xl font-extrabold">
                            <span>Grand Total</span>
                            <span>$460.00</span>
                        </div>
                    </div>

                    {{-- 🔽 PAYMENT METHOD (BOTTOM) --}}
                    <div class="mt-10">

                        <div class="text-2xl font-extrabold text-[#071434] mb-2">
                            Choose Payment Method
                        </div>

                        <p class="text-base text-gray-500 mb-6">
                            Select your preferred secure payment option to complete your booking.
                        </p>

                        {{-- ✅ GRID: side-by-side on desktop, stacked on mobile --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            {{-- PayPal --}}
                            <label
                                class="flex items-start gap-4 p-6 rounded-2xl border border-emerald-400 bg-emerald-50 cursor-pointer">
                                <input type="radio" name="pay_method"
                                    class="mt-1 text-emerald-600 focus:ring-emerald-600" checked>

                                <div class="flex-1">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-3">
                                            {{-- PayPal Logo --}}
                                            <img src="{{ asset('images/paypal.png') }}"
                                                alt="PayPal"
                                                class="h-8 w-auto">
                                        </div>

                                        <span class="h-3.5 w-3.5 rounded-full bg-emerald-600"></span>
                                    </div>

                                    <p class="text-base text-gray-600 mt-2">
                                        Fast, easy, and secure checkout using your PayPal account or linked card.
                                    </p>
                                </div>
                            </label>

                            {{-- Stripe --}}
                            <label
                                class="flex items-start gap-4 p-6 rounded-2xl border border-gray-200 cursor-pointer hover:bg-gray-50">
                                <input type="radio" name="pay_method"
                                    class="mt-1 text-emerald-600 focus:ring-emerald-600">

                                <div class="flex-1">
                                    <div class="flex items-center gap-3">
                                        {{-- Stripe Logo --}}
                                        <img src="{{ asset('images/stripe.png') }}"
                                            alt="Stripe"
                                            class="h-8 w-auto">
                                    </div>

                                    <p class="text-base text-gray-600 mt-2">
                                        Pay instantly with your debit or credit card through Stripe’s secure gateway.
                                    </p>
                                </div>
                            </label>

                        </div>
                    </div>

                </div>


                <div class="h-px bg-gray-200"></div>

                {{-- STEP 3 --}}
                <div class="px-6 md:px-8 py-8">

                    {{-- header (icon + title + desc like screenshot) --}}
                    <div class="flex items-start gap-4 mb-8">
                        {{-- user icon --}}
                        <div class="mt-1 flex h-12 w-12 items-center justify-center rounded-lg">
                            <img
                                src="{{ asset('images/man-icon.png') }}"
                                alt="User Icon"
                                class="h-10 w-10 object-contain">
                        </div>


                        <div>
                            <h3 class="text-2xl md:text-3xl font-extrabold text-[#071434] leading-tight">
                                Step 3 - Personal Information
                            </h3>
                            <p class="mt-1 text-base md:text-lg text-gray-600 max-w-3xl">
                                We’ll use your information only to coordinate your ride and keep you updated.
                            </p>
                        </div>
                    </div>

                    {{-- inputs --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-base font-bold text-[#071434]">Full Name</label>
                            <input type="text" placeholder="Enter your full name"
                                class="mt-2 w-full rounded-md border border-gray-300 px-4 py-3 text-base focus:border-emerald-600 focus:ring-emerald-600">
                        </div>

                        <div>
                            <label class="block text-base font-bold text-[#071434]">Email Address</label>
                            <input type="email" placeholder="Enter your email address"
                                class="mt-2 w-full rounded-md border border-gray-300 px-4 py-3 text-base focus:border-emerald-600 focus:ring-emerald-600">
                        </div>

                        <div>
                            <label class="block text-base font-bold text-[#071434]">Phone No.</label>
                            <input type="text" placeholder="Enter your phone no."
                                class="mt-2 w-full rounded-md border border-gray-300 px-4 py-3 text-base focus:border-emerald-600 focus:ring-emerald-600">
                        </div>

                        <div>
                            <label class="block text-base font-bold text-[#071434]">Alternate Contact No. (optional)</label>
                            <input type="text" placeholder="Enter your alternate contact no."
                                class="mt-2 w-full rounded-md border border-gray-300 px-4 py-3 text-base focus:border-emerald-600 focus:ring-emerald-600">
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-base font-bold text-[#071434]">Special Instructions (optional)</label>
                            <textarea rows="5" placeholder="Enter your message"
                                class="mt-2 w-full rounded-md border border-gray-300 px-4 py-3 text-base focus:border-emerald-600 focus:ring-emerald-600"></textarea>
                        </div>
                    </div>

                    {{-- divider --}}
                    <div class="mt-8 h-px bg-gray-200"></div>

                    {{-- notes + submit --}}
                    <div class="mt-6">

                        <ul class="list-disc pl-5 space-y-2 text-sm md:text-base text-gray-700 max-w-4xl">
                            <li>
                                By clicking <b>“Submit Booking,”</b> a summary pop-up will appear where you can review your details,
                                cancel, or proceed to payment.
                            </li>
                            <li>
                                You confirm that you are of legal age and agree to our
                                <a href="#" class="text-blue-600 font-semibold underline">Terms of Service</a>
                                and
                                <a href="#" class="text-blue-600 font-semibold underline">Privacy Policy</a>.
                            </li>
                            <li>
                                You authorize <b>HealthRide</b> to process your booking and contact you for confirmation or updates.
                            </li>
                            <li>
                                You acknowledge that all details provided are true and accurate to ensure a safe, reliable transport service.
                            </li>
                        </ul>

                        {{-- button BELOW --}}
                        <div class="mt-6">
                            <button
                                class="inline-flex items-center justify-center rounded-md
                   bg-emerald-700 px-10 py-4
                   text-base font-bold text-white
                   hover:bg-emerald-800 transition">
                                Submit Booking
                            </button>
                        </div>

                    </div>

                </div>


            </div>

            {{-- ✅ extra space so the overlapping van doesn't get clipped --}}
            <div class="h-6 md:h-10"></div>

        </div>
    </div>
</section>

@endsection