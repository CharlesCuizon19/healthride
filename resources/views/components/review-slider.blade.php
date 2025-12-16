@props([
'reviews' => [],
'badge' => 'Client Reviews',
'title' => 'What Our Passengers Say',
])

<section class="bg-[#f9f9f9] pt-16 md:pt-20 pb-20 md:pb-40">
    <div class="max-w-9xl mx-auto px-4">

        {{-- badge --}}
        <div class="flex justify-center mb-4">
            <div class="inline-flex items-center px-6 py-2 rounded-full border border-emerald-500/40 text-sm font-semibold tracking-wide text-emerald-600 bg-white">
                {{ $badge }}
            </div>
        </div>

        {{-- title --}}
        <h2 class="text-center text-[#071434] text-4xl md:text-5xl font-extrabold mb-12">
            {{ $title }}
        </h2>

        <div class="relative max-w-screen-2xl mx-auto">

            {{-- fade masks --}}
            <div class="pointer-events-none absolute inset-y-0 left-0 w-32 md:w-48 z-10
                        bg-gradient-to-r from-[#f9f9f9] via-[#f9f9f9]/85 to-transparent"></div>
            <div class="pointer-events-none absolute inset-y-0 right-0 w-32 md:w-48 z-10
                        bg-gradient-to-l from-[#f9f9f9] via-[#f9f9f9]/85 to-transparent"></div>

            {{-- Swiper --}}
            <div class="swiper review-swiper px-6 md:px-12 relative z-0">
                <div class="swiper-wrapper">
                    @foreach ($reviews as $review)
                    @php
                    $statement = is_array($review) ? ($review['statement'] ?? '') : ($review->statement ?? '');
                    $name = is_array($review) ? ($review['name'] ?? '') : ($review->name ?? '');
                    $type = is_array($review) ? ($review['passengerType'] ?? '') : ($review->passengerType ?? '');
                    $avatar = is_array($review) ? ($review['avatar'] ?? '') : ($review->avatar ?? '');
                    $avatarSrc = $avatar ? (str_starts_with($avatar, 'http') ? $avatar : asset($avatar)) : '';
                    @endphp

                    <div class="swiper-slide flex justify-center py-6">
                        <div class="review-card w-full max-w-5xl bg-white rounded-xl border border-gray-200 overflow-hidden">
                            <div class="px-8 md:px-14 py-10">
                                <div class="mb-6">
                                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-emerald-500 text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6">
                                            <path fill="currentColor" fill-rule="evenodd"
                                                d="M2.25 5A2.75 2.75 0 0 1 5 2.25h14A2.75 2.75 0 0 1 21.75 5v10A2.75 2.75 0 0 1 19 17.75H7.961c-.38 0-.739.173-.976.47l-2.33 2.913c-.798.996-2.405.433-2.405-.843zm7.231 5.75a4 4 0 0 1-.206.3c-.337.449-.796.91-1.305 1.42a.75.75 0 1 0 1.06 1.06l.022-.021c.484-.485 1.016-1.016 1.423-1.559s.775-1.205.775-1.95V8A1.75 1.75 0 0 0 9.5 6.25h-1A1.75 1.75 0 0 0 6.75 8v1c0 .966.784 1.75 1.75 1.75zm5.794.3q.12-.159.206-.3H14.5A1.75 1.75 0 0 1 12.75 9V8c0-.966.784-1.75 1.75-1.75h1c.966 0 1.75.784 1.75 1.75v2c0 .745-.368 1.407-.775 1.95s-.939 1.074-1.423 1.559l-.022.021a.75.75 0 1 1-1.06-1.06c.51-.51.968-.971 1.305-1.42"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>

                                <p class="text-lg md:text-xl leading-relaxed text-[#323a4d]">
                                    “{{ $statement }}”
                                </p>
                            </div>

                            <div class="border-t border-gray-200 px-8 md:px-14 py-6">
                                <div class="flex items-center gap-4">
                                    @if($avatarSrc)
                                    <img src="{{ $avatarSrc }}" alt="{{ $name }}" class="w-14 h-14 rounded-full object-cover">
                                    @else
                                    <div class="w-14 h-14 rounded-full bg-gray-200"></div>
                                    @endif

                                    <div class="flex flex-col">
                                        <span class="text-lg font-bold text-[#071434]">{{ $name }}</span>
                                        <span class="text-emerald-600 text-sm md:text-base">{{ $type }}</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- arrows --}}
            <button type="button"
                class="review-prev hidden md:flex absolute left-0 top-1/2 -translate-y-1/2 -translate-x-1/2
                       h-11 w-11 rounded-full border border-gray-300 bg-white shadow-sm
                       items-center justify-center text-gray-700 hover:bg-gray-50 z-20">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                    <path d="M15 18l-6-6 6-6" />
                </svg>
            </button>

            <button type="button"
                class="review-next hidden md:flex absolute right-0 top-1/2 -translate-y-1/2 translate-x-1/2
                       h-11 w-11 rounded-full border border-gray-300 bg-white shadow-sm
                       items-center justify-center text-gray-700 hover:bg-gray-50 z-20">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                    <path d="M9 18l6-6-6-6" />
                </svg>
            </button>

            {{-- dots --}}
            <div class="review-pagination swiper-pagination mt-10 flex justify-center"></div>
        </div>
    </div>
</section>

@once
@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
    .review-swiper {
        overflow: visible;
    }

    /* base state = blurred / faded */
    .review-swiper .swiper-slide {
        opacity: .18;
        transform: scale(.94);
        filter: blur(2px);
        transition: opacity .35s ease, transform .35s ease, filter .35s ease;
    }

    /* prev/next = less blur than far ones */
    .review-swiper .swiper-slide-prev,
    .review-swiper .swiper-slide-next {
        opacity: .45;
        transform: scale(.92);
        filter: blur(1.4px);
    }

    /* active = highlighted */
    .review-swiper .swiper-slide-active {
        opacity: 1;
        transform: scale(1);
        filter: blur(0);
    }

    /* stronger highlight shadow only for active card */
    .review-swiper .swiper-slide-active .review-card {
        box-shadow: 0 18px 45px rgba(0, 0, 0, .16);
        border-color: rgba(17, 24, 39, .12);
    }

    .review-pagination .swiper-pagination-bullet {
        width: 8px;
        height: 8px;
        background: #d4d4d4;
        opacity: 1;
        margin: 0 6px;
    }

    .review-pagination .swiper-pagination-bullet-active {
        background: #0b1b3a;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const swiper = new Swiper('.review-swiper', {
            loop: true,
            centeredSlides: true,
            speed: 600,
            spaceBetween: 40,
            slidesPerView: 1,

            pagination: {
                el: '.review-pagination',
                clickable: true,
                renderBullet: function(index, className) {
                    return `<span class="${className}"></span>`;
                },
            },

            navigation: {
                nextEl: '.review-next',
                prevEl: '.review-prev'
            },

            breakpoints: {
                768: {
                    slidesPerView: 1.2
                },
                1024: {
                    slidesPerView: 1.6
                },
                1440: {
                    slidesPerView: 2.1
                },
            },

            // ✅ keep bullets synced with REAL slides (fix for loop)
            on: {
                init: function() {
                    syncBullets(this);
                },
                slideChange: function() {
                    syncBullets(this);
                }
            }
        });

        function syncBullets(sw) {
            if (!sw.pagination || !sw.pagination.bullets) return;
            const real = sw.realIndex;
            sw.pagination.bullets.forEach((b, i) => {
                b.classList.toggle('swiper-pagination-bullet-active', i === real);
            });
        }
    });
</script>
@endpush
@endonce