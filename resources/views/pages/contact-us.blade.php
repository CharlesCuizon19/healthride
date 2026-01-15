@extends('layouts.app')

@section('page-title', 'Contact Us')
@section('content')

<x-banner2 title="Contact Us" background="images/contact-us.png" />


<section class="w-full bg-[#ffffff] py-15 md:py-20">
    <div class="max-w-screen-2xl mx-auto px-6 lg:px-12">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-0 overflow-hidden">

            {{-- LEFT: BIGGER IMAGE --}}
            <div class="relative h-[420px] md:h-[520px] lg:h-[700px]">
                <img
                    src="{{ asset('images/contact-us-nurse.png') }}"
                    alt="Smiling nurse beside HealthRide vehicle"
                    class="w-full h-full object-cover">
            </div>

            {{-- RIGHT: BIGGER FORM --}}
            <div class="flex flex-col px-8 py-10 md:px-14 md:py-14 lg:px-16 lg:py-0 bg-white">

                {{-- Pill --}}
                <div class="mb-6 flex justify-start lg:justify-end">
                    <span
                        class="inline-flex items-center px-6 py-2 rounded-full border border-[#0A8B6C]/40 text-[#0A8B6C] text-base font-semibold">
                        Get in Touch
                    </span>
                </div>

                {{-- BIGGER HEADING --}}
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-[#071434] leading-snug mb-10">
                    Message Us for Safe and<br class="hidden md:block">
                    Compassionate Transport
                </h2>

                @if(session('contact_success'))
                <div
                    class="mb-6 px-5 py-4 rounded-xl
               bg-emerald-50 border border-emerald-200
               text-emerald-700 text-base font-semibold
               flex items-center gap-3">

                    <svg class="w-6 h-6 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.707a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414L9 13.414l4.707-4.707z"
                            clip-rule="evenodd" />
                    </svg>

                    <span>{{ session('contact_success') }}</span>
                </div>
                @endif

                @if ($errors->any())
                <div class="mb-6 px-5 py-4 rounded-xl bg-red-50 border border-red-200 text-red-700">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif



                <form action="{{ route('contacts.store') }}" method="POST" class="space-y-8">
                    @csrf

                    {{-- Row 1 --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                            <input type="text" name="full_name" required
                                class="w-full rounded-lg border border-gray-300 px-4 py-3">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Phone No.</label>
                            <input type="text" name="phone_number"
                                class="w-full rounded-lg border border-gray-300 px-4 py-3">
                        </div>
                    </div>

                    {{-- Row 2 --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" name="email" required
                                class="w-full rounded-lg border border-gray-300 px-4 py-3">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
                            <select name="subject" required
                                class="w-full rounded-lg border border-gray-300 px-4 py-3">
                                <option value="">Select</option>
                                <option value="booking">Ride Booking</option>
                                <option value="billing">Billing & Payments</option>
                                <option value="general">General Inquiry</option>
                            </select>
                        </div>
                    </div>

                    {{-- Message --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                        <textarea name="message" rows="5" required
                            class="w-full rounded-lg border border-gray-300 px-4 py-3"></textarea>
                    </div>

                    {{-- Button --}}
                    <button type="submit"
                        class="px-10 py-3 rounded-lg bg-[#0A8B6C] text-white font-semibold">
                        Submit Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

{{-- SECTION 1: Referral Banner --}}
<section class="w-full bg-[#ffffff] pb-15 md:pb-60">
    <div class="max-w-screen-2xl mx-auto px-6 lg:px-10">

        <div
            class="relative w-full rounded-3xl overflow-hidden 
   bg-gradient-to-r from-[#008f6b] via-[#019777] to-[#009c85] text-white
   min-h-[340px] md:min-h-[400px] lg:min-h-[570px] flex items-center
   bg-cover bg-center"
            style="background-image: url('{{ asset('images/referral-bg.png') }}');">


            <div class="grid grid-cols-1 lg:grid-cols-2 items-center w-full">

                {{-- LEFT TEXT --}}
                <div class="px-10 lg:px-14 py-12 lg:py-20 space-y-8">

                    <span
                        class="inline-flex items-center px-6 py-2 rounded-full bg-white/10 border border-white/30
                       text-sm md:text-base font-medium">
                        Referral Form
                    </span>

                    <div class="space-y-4">
                        <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold leading-tight">
                            Partner With HealthRide
                        </h2>

                        <p class="text-base md:text-lg lg:text-xl text-white/90 max-w-2xl leading-relaxed">
                            Clinics, social workers, rehabilitation centers, and care coordinators can easily refer
                            patients who need reliable non-emergency medical transportation.
                        </p>
                    </div>

                    <div class="pt-2">
                        <a href="#"
                            class="inline-flex items-center gap-2 px-6 py-4 rounded-md bg-white text-[#00735c]
                           text-base md:text-lg font-semibold shadow-md hover:bg-slate-100 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M12 3a1 1 0 0 1 1 1v9.586l2.293-2.293a1 1 0 1 1 1.414 1.414l-4 4a1 1 0 0 1-1.414 0l-4-4A1 1 0 0 1 8.707 11.3L11 13.586V4a1 1 0 0 1 1-1Zm-7 14a1 1 0 0 1 1-1h12a1 1 0 1 1 0 2H6a1 1 0 0 1-1-1Z" />
                            </svg>
                            <span class="font-semibold">Download Referral Form (PDF)</span>
                        </a>
                    </div>
                </div>

                {{-- RIGHT IMAGE (LOWERED) --}}
                <div class="hidden lg:flex items-center justify-center pr-12 mt-16">
                    <img
                        src="{{ asset('images/pdf-form.png') }}"
                        alt="Referral forms"
                        class="max-h-[520px] xl:max-h-[760px] drop-shadow-2xl object-contain">
                </div>

            </div>

            {{-- Overlay --}}
            <div class="pointer-events-none absolute inset-0 opacity-10
                bg-[radial-gradient(circle_at_top,_#ffffff,_transparent_70%)]"></div>
        </div>

    </div>
</section>

{{-- CONTACT CARDS + MAP ON BG IMAGE --}}
<section class="w-full bg-cover bg-center bg-no-repeat pt-32 pb-60"
    style="background-image: url('{{ asset('images/bg-map.png') }}');">

    {{-- CONTACT CARDS (overlapping upwards, max-w-screen-xl) --}}
    <div class="max-w-screen-xl mx-auto px-6 lg:px-10 -mt-20 lg:-mt-60 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- Card 1: Call --}}
            <div class="relative bg-[#041d3f] text-white rounded-xl shadow-lg 
                        flex items-center px-8 py-5 min-h-[200px] overflow-hidden">
                <img src="{{ asset('images/icon-phone-bg.png') }}"
                    class="absolute right-4 top-4 opacity-10 w-32 pointer-events-none" />
                <div class="flex items-center justify-center w-12 h-12 rounded-full 
                            bg-white/10 border border-white/20 mr-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M6.62 10.79a15 15 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.02-.24c1.12.37 2.33.56 3.57.56a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1C12.3 21 3 11.7 3 1a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.24.19 2.45.56 3.57a1 1 0 0 1-.24 1.02z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-semibold leading-tight">Call Us</h3>
                    <p class="text-sm text-white/80">
                        <span class="font-semibold">Hotline:</span> (925) 501-4813
                    </p>
                </div>
            </div>

            {{-- Card 2: Locate --}}
            <div class="relative bg-[#062a73] text-white rounded-xl shadow-lg 
                        flex items-center px-8 py-5 min-h-[200px] overflow-hidden">
                <img src="{{ asset('images/icon-location-bg.png') }}"
                    class="absolute right-4 top-4 opacity-10 w-32 pointer-events-none" />
                <div class="flex items-center justify-center w-12 h-12 rounded-full 
                            bg-white/10 border border-white/20 mr-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 2a7 7 0 0 0-7 7c0 4.02 4.2 8.44 6.07 10.24a1.3 1.3 0 0 0 1.86 0C14.8 17.44 19 13.02 19 9a7 7 0 0 0-7-7m0 9.5A2.5 2.5 0 1 1 14.5 9 2.5 2.5 0 0 1 12 11.5" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-semibold leading-tight">Locate Us</h3>
                    <p class="text-sm text-white/80 leading-tight">
                        4322 Century Blvd Ste B #407,<br>Pittsburg, CA 94565
                    </p>
                </div>
            </div>

            {{-- Card 3: Email --}}
            <div class="relative bg-[#041d3f] text-white rounded-xl shadow-lg 
                        flex items-center px-8 py-5 min-h-[200px] overflow-hidden">
                <img src="{{ asset('images/icon-email-bg.png') }}"
                    class="absolute right-4 top-4 opacity-10 w-32 pointer-events-none" />
                <div class="flex items-center justify-center w-12 h-12 rounded-full 
                            bg-white/10 border border-white/20 mr-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M4 4h16a2 2 0 0 1 2 2v.4l-10 6.25L2 6.4V6a2 2 0 0 1 2-2Zm0 4.85V18h16V8.85l-7.55 4.72a2 2 0 0 1-2.1 0z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-semibold leading-tight">Email Us</h3>
                    <p class="text-sm text-white/80 break-all">
                        HealthRideMedicalTransport@gmail.com
                    </p>
                </div>
            </div>

        </div>
    </div>

    {{-- MAP BELOW (no overlap) --}}
    <div class="max-w-screen-2xl mx-auto px-6 lg:px-10 mt-10 lg:mt-14">
        <div class="w-full rounded-3xl overflow-hidden shadow-xl backdrop-blur-sm">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3169.935182707941!2d-121.883!3d37.997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2s4322%20Century%20Blvd%2C%20Pittsburg%2C%20CA!5e0!3m2!1sen!2sus!4v0000000000000"
                style="border:0;" allowfullscreen loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                class="w-full h-[320px] md:h-[380px] lg:h-[720px]">
            </iframe>
        </div>
    </div>

</section>

<script>
    setTimeout(() => {
        const msg = document.querySelector('[data-contact-success]');
        if (msg) msg.classList.add('hidden');
    }, 6000);
</script>

@endsection