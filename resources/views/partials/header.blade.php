<header class="fixed z-50 w-full">
    <!-- Top Bar -->
    <div class="w-full bg-white shadow-md" x-data="{ scrolled: false }" x-init="window.addEventListener('scroll', () => {
        scrolled = window.scrollY > 50
    })"
        :class="scrolled
            ?
            'pb-0 transition-all duration-300' :
            'pb-7 transition-all duration-300'">
        <div class="container flex items-center justify-between mx-auto">
            <!-- Logo -->
            <div class="flex items-center justify-center w-full gap-3 py-2 xl:w-auto">
                <img src="{{ asset('images/logo.png') }}" alt="HealthRide Logo" class="w-auto h-16">
            </div>

            <!-- Contact Info (hidden on mobile) -->
            <div
                class="hidden lg:flex items-center gap-6 text-lg bg-[#e9e9e9] h-full text-[#091636] p-5 mb-3 rounded-b-2xl">
                <div class="flex items-center gap-2">
                    <div class="p-3 rounded-full bg-[#d2d2d2]">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12" class="size-5">
                            <path fill="currentColor"
                                d="M6 .5A4.5 4.5 0 0 1 10.5 5c0 1.863-1.42 3.815-4.2 5.9a.5.5 0 0 1-.6 0C2.92 8.815 1.5 6.863 1.5 5A4.5 4.5 0 0 1 6 .5m0 3a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3" />
                        </svg>
                    </div>
                    <span>4322 Century Blvd Ste B #407, Pittsburg, CA 94565</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="p-3 rounded-full bg-[#d2d2d2]">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-5">
                            <path fill="currentColor"
                                d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2m0 4l-8 5l-8-5V6l8 5l8-5z" />
                        </svg>
                    </div>
                    <span>HealthRideMedicalTransport@gmail.com</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="p-3 rounded-full bg-[#d2d2d2]">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" class="size-5">
                            <path fill="currentColor"
                                d="M144.27 45.93a8 8 0 0 1 9.8-5.66a86.22 86.22 0 0 1 61.66 61.66a8 8 0 0 1-5.66 9.8a8.2 8.2 0 0 1-2.07.27a8 8 0 0 1-7.73-5.93a70.35 70.35 0 0 0-50.33-50.34a8 8 0 0 1-5.67-9.8m-2.33 41.8c13.79 3.68 22.65 12.55 26.33 26.34A8 8 0 0 0 176 120a8.2 8.2 0 0 0 2.07-.27a8 8 0 0 0 5.66-9.8c-5.12-19.16-18.5-32.54-37.66-37.66a8 8 0 1 0-4.13 15.46m72.43 78.73l-47.11-21.11l-.13-.06a16 16 0 0 0-15.17 1.4a8 8 0 0 0-.75.56L126.87 168c-15.42-7.49-31.34-23.29-38.83-38.51l20.78-24.71c.2-.25.39-.5.57-.77a16 16 0 0 0 1.32-15.06v-.12L89.54 41.64a16 16 0 0 0-16.62-9.52A56.26 56.26 0 0 0 24 88c0 79.4 64.6 144 144 144a56.26 56.26 0 0 0 55.88-48.92a16 16 0 0 0-9.51-16.62" />
                        </svg>
                    </div>
                    <span><span class="font-bold">Hotline:</span> (925) 501-4813</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Bar -->
    <div class="flex items-center justify-center w-full"
        x-data="{
        scrolled: false,
        onScroll() {
            // ✅ Disable scroll animation on mobile/tablet
            if (window.innerWidth < 1024) {   // < lg
                this.scrolled = false;
                return;
            }
            this.scrolled = window.scrollY > 50;
        }
     }"
        x-init="
        onScroll();
        window.addEventListener('scroll', () => onScroll());
        window.addEventListener('resize', () => onScroll());
     "
        :class="scrolled
        ?
        'fixed z-50 bg-[#010c29] shadow-lg backdrop-blur-md translate-x-[185px] w-auto transition-all duration-300' :
        'fixed w-full z-50 bg-transparent transition-all duration-300'"
        class="fixed z-50 w-full">

        <nav class=" bg-[#071434] p-4 container mx-auto rounded-xl absolute z-50 h-fit" x-data="{ scrolled: false }"
            x-init="window.addEventListener('scroll', () => {
                scrolled = window.scrollY > 50
            })"
            :class="scrolled
                ?
                ' xl:bottom-2 max-w-[1190px] -bottom-10 transition-all duration-300' :
                'fixed xl:-bottom-14 -bottom-10 transition-all duration-300'">
            <div class="flex items-center justify-between text-white">

                <!-- Desktop Menu -->
                <ul class="items-center hidden text-lg gap-14 lg:flex">
                    <a href="{{ route('home') }}"
                        class="{{ Route::is('home') ? 'bg-[#1f2b48] px-4 py-2 rounded-md' : 'text-[#c4c4c4]' }} hover:text-white transition duration-300">Home
                    </a>
                    <a href="{{ route('about-us') }}"
                        class="{{ Route::is('about-us') ? 'bg-[#1f2b48] px-4 py-2 rounded-md' : 'text-[#c4c4c4]' }} hover:text-white transition duration-300">About
                        Us</a>
                    <a href="{{ route('services') }}"
                        class="{{ Route::is('services') ? 'bg-[#1f2b48] px-4 py-2 rounded-md' : 'text-[#c4c4c4]' }} hover:text-white transition duration-300">
                        Services</a>
                    <a href="{{ route('destinations') }}"
                        class="{{ Route::is('destinations') ? 'bg-[#1f2b48] px-4 py-2 rounded-md' : 'text-[#c4c4c4]' }} hover:text-white transition duration-300">
                        Destinations</a>
                    <a href="{{ route('reviews') }}"
                        class="{{ Route::is('reviews') ? 'bg-[#1f2b48] px-4 py-2 rounded-md' : 'text-[#c4c4c4]' }} hover:text-white transition duration-300">
                        Reviews</a>
                    <a href="{{ route('contact-us') }}"
                        class="{{ Route::is('contact-us') ? 'bg-[#1f2b48] px-4 py-2 rounded-md' : 'text-[#c4c4c4]' }} hover:text-white transition duration-300">
                        Contact Us</a>
                </ul>

                <!-- Book a Ride Link (desktop) -->
                <div class="hidden lg:block">
                    <a href="{{ route('bookARide') }}"
                        class="flex items-center gap-2 bg-[#19957b] hover:bg-[#007748]
                    px-6 py-3 rounded-md text-lg font-medium text-white transition">

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" class="size-6">
                            <path fill="currentColor"
                                d="m255.43 117l-14-35a15.93 15.93 0 0 0-14.85-10H192v-8a8 8 0 0 0-8-8H32a16 16 0 0 0-16 16v112a16 16 0 0 0 16 16h17a32 32 0 0 0 62 0h50a32 32 0 0 0 62 0h17a16 16 0 0 0 16-16v-64a7.9 7.9 0 0 0-.57-3M80 208a16 16 0 1 1 16-16a16 16 0 0 1-16 16m56-80h-16v16a8 8 0 0 1-16 0v-16H88a8 8 0 0 1 0-16h16V96a8 8 0 0 1 16 0v16h16a8 8 0 0 1 0 16m56 80a16 16 0 1 1 16-16a16 16 0 0 1-16 16m0-96V88h34.58l9.6 24Z" />
                        </svg>
                        Book a Ride
                    </a>
                </div>


                <!-- Mobile Burger Menu Button -->
                <button id="mobile-menu-btn" class="z-50 lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <!-- Mobile Menu (hidden by default) -->
                <div id="mobile-menu"
                    class="lg:hidden fixed inset-0 bg-[#071732] transform -translate-x-full transition-transform duration-300 ease-in-out z-40">
                    <div class="flex flex-col items-center justify-center h-full space-y-8 text-xl">
                        <a href="{{ route('home') }}" class="hover:bg-[#0e2b5e] px-6 py-3 rounded-md transition">Home</a>
                        <a href="{{ route('about-us') }}" class="hover:bg-[#0e2b5e] px-6 py-3 rounded-md transition">About Us</a>
                        <a href="{{ route('services') }}" class="hover:bg-[#0e2b5e] px-6 py-3 rounded-md transition">Services</a>
                        <a href="{{ route('destinations') }}" class="hover:bg-[#0e2b5e] px-6 py-3 rounded-md transition">Destinations</a>
                        <a href="{{ route('reviews') }}" class="hover:bg-[#0e2b5e] px-6 py-3 rounded-md transition">Reviews</a>
                        <a href="{{ route('contact-us') }}" class="hover:bg-[#0e2b5e] px-6 py-3 rounded-md transition">Contact Us</a>

                        <button
                            class="flex items-center gap-2 bg-[#19957b] hover:bg-[#007748] px-8 py-4 rounded-md text-lg font-medium mt-8">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" class="size-7">
                                <path fill="currentColor"
                                    d="m255.43 117l-14-35a15.93 15.93 0 0 0-14.85-10H192v-8a8 8 0 0 0-8-8H32a16 16 0 0 0-16 16v112a16 16 0 0 0 16 16h17a32 32 0 0 0 62 0h50a32 32 0 0 0 62 0h17a16 16 0 0 0 16-16v-64a7.9 7.9 0 0 0-.57-3M80 208a16 16 0 1 1 16-16a16 16 0 0 1-16 16m56-80h-16v16a8 8 0 0 1-16 0v-16H88a8 8 0 0 1 0-16h16V96a8 8 0 0 1 16 0v16h16a8 8 0 0 1 0 16m56 80a16 16 0 1 1 16-16a16 16 0 0 1-16 16m0-96V88h34.58l9.6 24Z" />
                            </svg>
                            Book a Ride
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>

<!-- Simple Alpine.js script to toggle mobile menu (you can also use plain JS or Livewire) -->
<script>
    document.getElementById('mobile-menu-btn').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('-translate-x-full');
    });
</script>