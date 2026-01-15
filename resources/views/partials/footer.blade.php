<footer class="bg-[#f4f5f7] pb-8 relative">
    <div class="max-w-screen-2xl mx-auto px-4">

        {{-- NEWSLETTER CARD (floating between sections) --}}
        <div
            class="absolute left-1/2 -translate-x-1/2 -top-28 w-full md:w-[90%] lg:w-[80%]
                   bg-gradient-to-b from-[#02041c] via-[#060b2b] to-[#00786a]
                   rounded-[32px] px-6 py-10 md:px-16 md:py-14
                   text-center text-white shadow-xl">

            <div class="inline-flex items-center px-5 py-1 rounded-full border border-white/30 text-xs font-semibold tracking-wide mb-4">
                Newsletter
            </div>

            <h2 class="text-2xl md:text-3xl lg:text-5xl font-semibold mb-3">
                Stay Connected with HealthRide
            </h2>

            <p class="text-sm md:text-base text-white/80 max-w-2xl mx-auto">
                Get helpful health tips, service updates, and exclusive offers straight to your inbox.
            </p>

            {{-- ✅ Dynamic Newsletter Form (AJAX) --}}
            <form
                id="newsletter-form"
                class="mt-8 max-w-2xl mx-auto flex flex-col sm:flex-row gap-3">
                @csrf

                <input
                    type="email"
                    name="newsletter_email"
                    id="newsletter_email"
                    placeholder="Enter your email address"
                    required
                    class="flex-1 px-4 py-3 rounded-full text-sm text-gray-900 bg-white
                           focus:outline-none focus:ring-2 focus:ring-emerald-500">

                <button
                    type="submit"
                    id="newsletter-btn"
                    class="px-6 py-3 rounded-full bg-emerald-500 text-white text-sm font-semibold
                           hover:bg-emerald-600 transition disabled:opacity-60 disabled:cursor-not-allowed">
                    Subscribe Now
                </button>
            </form>

            {{-- feedback --}}
            <p id="newsletter-message" class="mt-3 text-center text-sm hidden"></p>
        </div>

        {{-- MAIN FOOTER CONTENT --}}
        <div class="pt-60 space-y-12">

            {{-- MAIN GRID --}}
            <div class="grid gap-10 md:grid-cols-[minmax(0,2fr)_minmax(0,1.2fr)_minmax(0,1.5fr)]">

                {{-- Brand + description --}}
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/logo.png') }}" alt="HealthRide Logo" class="h-14 w-auto">
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
                                <a href="{{ route('services') }}" class="hover:text-emerald-600">Services</a>
                            </li>
                        </ul>

                        {{-- RIGHT --}}
                        <ul class="space-y-2 text-gray-700 text-lg">
                            <li class="flex items-center gap-2">
                                <img src="{{ asset('images/plus-icon.png') }}" alt="Plus Icon" class="h-5 w-5">
                                <a href="{{ route('destinations') }}" class="hover:text-emerald-600">Destinations</a>
                            </li>

                            <li class="flex items-center gap-2">
                                <img src="{{ asset('images/plus-icon.png') }}" alt="Plus Icon" class="h-5 w-5">
                                <a href="{{ route('reviews') }}" class="hover:text-emerald-600">Reviews</a>
                            </li>

                            <li class="flex items-center gap-2">
                                <img src="{{ asset('images/plus-icon.png') }}" alt="Plus Icon" class="h-5 w-5">
                                <a href="{{ route('contact-us') }}" class="hover:text-emerald-600">Contact Us</a>
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

    {{-- ✅ Newsletter AJAX Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('newsletter-form');
            const emailInput = document.getElementById('newsletter_email');
            const btn = document.getElementById('newsletter-btn');
            const msg = document.getElementById('newsletter-message');

            if (!form) return;

            form.addEventListener('submit', async (e) => {
                e.preventDefault();

                msg.classList.add('hidden');
                msg.className = 'mt-3 text-center text-sm hidden';

                btn.disabled = true;
                const oldText = btn.innerText;
                btn.innerText = 'Subscribing...';

                try {
                    const res = await fetch("{{ route('newsletter.store') }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value,
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            email: emailInput.value
                        })
                    });

                    const data = await res.json();

                    if (!res.ok) throw data;

                    msg.textContent = data.message ?? 'Thank you for subscribing!';
                    msg.className = 'mt-3 text-center text-sm text-emerald-200 font-semibold';
                    msg.classList.remove('hidden');

                    form.reset();
                } catch (err) {
                    msg.textContent =
                        err?.errors?.email?.[0] ||
                        err?.errors?.newsletter_email?.[0] ||
                        err?.message ||
                        'Something went wrong. Please try again.';

                    msg.className = 'mt-3 text-center text-sm text-red-200 font-semibold';
                    msg.classList.remove('hidden');
                } finally {
                    btn.disabled = false;
                    btn.innerText = oldText;
                }
            });
        });
    </script>
</footer>