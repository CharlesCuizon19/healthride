<footer class="bg-[#f4f5f7] pb-8 relative">
    <div class="max-w-screen-2xl mx-auto px-4">

        {{-- NEWSLETTER CARD (floating between sections) --}}
        <div
            class="absolute left-1/2 -translate-x-1/2 -top-28 w-full md:w-[90%] lg:w-[80%]
                   bg-gradient-to-b from-[#02041c] via-[#060b2b] to-[#00786a]
                   rounded-[32px] px-6 py-30 md:px-16 md:py-14
                   text-center text-white shadow-xl">

            <div
                class="inline-flex items-center px-5 py-1 rounded-full border border-white/30 text-xs font-semibold tracking-wide mb-4">
                Newsletter
            </div>

            <h2 class="text-2xl md:text-3xl lg:text-5xl font-semibold mb-3">
                Stay Connected with HealthRide
            </h2>

            <p class="text-sm md:text-base text-white/80 max-w-2xl mx-auto">
                Get helpful health tips, service updates, and exclusive offers straight to your inbox.
            </p>

            <form class="mt-8 max-w-2xl mx-auto flex flex-col sm:flex-row gap-3">
                <input
                    type="email"
                    name="newsletter_email"
                    placeholder="Enter your email address"
                    class="flex-1 px-4 py-3 rounded-full text-sm text-gray-900 bg-white 
                           focus:outline-none focus:ring-2 focus:ring-emerald-500">

                <button
                    type="submit"
                    class="px-6 py-3 rounded-full bg-emerald-500 text-sm font-semibold 
                           hover:bg-emerald-600 transition">
                    Subscribe Now
                </button>
            </form>
        </div>

        {{-- MAIN FOOTER CONTENT --}}
        <div class="pt-60 space-y-12">

            {{-- MAIN GRID --}}
            <div class="grid gap-10 md:grid-cols-[minmax(0,2fr)_minmax(0,1.2fr)_minmax(0,1.5fr)]">

                {{-- Brand + description --}}
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/logo.png') }}" alt="HealthRide Logo" class="h-15 w-auto">
                    </div>

                    <p class="text-lg font-semibold text-gray-600 leading-relaxed">
                        HealthRide Medical Transport LLC provides safe, reliable, and compassionate
                        non-emergency medical transportation, ensuring every passenger reaches their
                        destination with comfort and care.
                    </p>
                </div>

                {{-- Quick Links --}}
                <div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-4">Quick Links</h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-12">
                        {{-- LEFT --}}
                        <ul class="space-y-2 text-gray-700 text-lg">
                            <li class="flex items-center gap-2">
                                <img src="{{ asset('images/plus-icon.png') }}" alt="Plus Icon" class="h-5 w-5">
                                <a href="{{ route('home') }}" class="hover:text-emerald-600">Home</a>
                            </li>

                            <li class="flex items-center gap-2">
                                <img src="{{ asset('images/plus-icon.png') }}" alt="Plus Icon" class="h-5 w-5">
                                <a href="{{ route('about-us') }}" class="hover:text-emerald-600">About Us</a>
                            </li>

                            <li class="flex items-center gap-2">
                                <img src="{{ asset('images/plus-icon.png') }}" alt="Plus Icon" class="h-5 w-5">
                                <a href="#" class="hover:text-emerald-600">Services</a>
                            </li>
                        </ul>

                        {{-- RIGHT --}}
                        <ul class="space-y-2 text-gray-700 text-lg">
                            <li class="flex items-center gap-2">
                                <img src="{{ asset('images/plus-icon.png') }}" alt="Plus Icon" class="h-5 w-5">
                                <a href="#" class="hover:text-emerald-600">Destinations</a>
                            </li>

                            <li class="flex items-center gap-2">
                                <img src="{{ asset('images/plus-icon.png') }}" alt="Plus Icon" class="h-5 w-5">
                                <a href="#" class="hover:text-emerald-600">Reviews</a>
                            </li>

                            <li class="flex items-center gap-2">
                                <img src="{{ asset('images/plus-icon.png') }}" alt="Plus Icon" class="h-5 w-5">
                                <a href="#" class="hover:text-emerald-600">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Get In Touch --}}
                <div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-4">Get in Touch</h3>

                    <ul class="space-y-4 text-lg text-gray-700">
                        <li class="flex items-start gap-3">
                            <img src="{{ asset('images/location-icon.png') }}" alt="Location Icon">
                            <p>4322 Century Blvd Ste B #407, Pittsburg, CA 94565</p>
                        </li>

                        <li class="flex items-start gap-3">
                            <img src="{{ asset('images/email-icon.png') }}" alt="Email Icon">
                            <a href="mailto:HealthRideMedicalTransport@gmail.com" class="hover:text-emerald-600">
                                HealthRideMedicalTransport@gmail.com
                            </a>
                        </li>

                        <li class="flex items-start gap-3">
                            <img src="{{ asset('images/phone-icon.png') }}" alt="Phone Icon">
                            <a href="tel:+19255014813" class="hover:text-emerald-600">
                                (925) 501-4813
                            </a>
                        </li>
                    </ul>
                </div>

            </div>

            {{-- BOTTOM BAR --}}
            <div
                class="border-t border-gray-300 pt-4 mt-4 flex flex-col md:flex-row 
                       items-center justify-between gap-3 text-gray-500 text-lg">

                <p class="text-center md:text-left">
                    <span class="text-black">
                        © {{ date('Y') }} HealthRide Medical Transport LLC.
                        Designed and Developed by
                    </span>
                    <span class="font-semibold text-orange-500">R Web Solutions, Corp.</span>
                </p>

                <div class="flex items-center gap-4">
                    <a href="#" class="hover:text-emerald-600">Terms & Condition</a>
                    <span class="w-1 h-1 rounded-full bg-orange-400"></span>
                    <a href="#" class="hover:text-emerald-600">Privacy Policy</a>
                </div>

            </div>

        </div>
    </div>
</footer>