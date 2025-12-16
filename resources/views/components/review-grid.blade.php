@props([
'heading' => 'Reviews That Reflect Our Commitment',
'reviews' => [],
])

<section class="w-full bg-[#f9fbfd] pt-16 md:pt-20 pb-20 md:pb-40">
    <div class="max-w-screen-2xl mx-auto px-6 lg:px-10">

        {{-- Heading --}}
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-center text-[#071434] mb-12">
            {{ $heading }}
        </h2>

        <div x-data="{ visible: 6 }">

            {{-- GRID --}}
            <div class="grid gap-8 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($reviews as $index => $review)
                <div
                    x-show="{{ $index }} < visible"
                    x-transition
                    class="bg-white rounded-2xl shadow-sm border border-gray-200 flex flex-col h-full
                           transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:border-gray-300">

                    {{-- Top: quote + text --}}
                    <div class="px-8 pt-8 pb-6">

                        {{-- Green quote icon --}}
                        <div class="inline-flex items-center justify-center w-12 h-12 mb-6 rounded-md bg-[#0A8B6C] text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                class="h-6 w-6">
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M2.25 5A2.75 2.75 0 0 1 5 2.25h14A2.75 2.75 0 0 1 21.75 5v10A2.75 2.75 0 0 1 19 17.75H7.961c-.38 0-.739.173-.976.47l-2.33 2.913c-.798.996-2.405.433-2.405-.843zm7.231 5.75a4 4 0 0 1-.206.3c-.337.449-.796.91-1.305 1.42a.75.75 0 1 0 1.06 1.06l.022-.021c.484-.485 1.016-1.016 1.423-1.559s.775-1.205.775-1.95V8A1.75 1.75 0 0 0 9.5 6.25h-1A1.75 1.75 0 0 0 6.75 8v1c0 .966.784 1.75 1.75 1.75zm5.794.3q.12-.159.206-.3H14.5A1.75 1.75 0 0 1 12.75 9V8c0-.966.784-1.75 1.75-1.75h1c.966 0 1.75.784 1.75 1.75v2c0 .745-.368 1.407-.775 1.95s-.939 1.074-1.423 1.559l-.022.021a.75.75 0 1 1-1.06-1.06c.51-.51.968-.971 1.305-1.42"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>

                        <p class="text-base md:text-lg leading-relaxed text-[#071434]">
                            {{ $review['quote'] }}
                        </p>
                    </div>

                    {{-- Bottom: avatar + name + role --}}
                    <div class="border-t border-gray-100 px-8 py-5 flex items-center gap-4">
                        <div class="shrink-0">
                            <img src="{{ asset($review['avatar']) }}"
                                alt="{{ $review['name'] }}"
                                class="w-14 h-14 rounded-full object-cover">
                        </div>

                        <div class="flex flex-col">
                            <span class="text-lg font-semibold text-[#071434]">
                                {{ $review['name'] }}
                            </span>
                            <span class="text-sm md:text-base text-[#0A8B6C]">
                                {{ $review['role'] }}
                            </span>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>

            {{-- Load More Button --}}
            @if (count($reviews) > 6)
            <div class="flex justify-center mt-10">
                <button
                    type="button"
                    @click="visible = {{ count($reviews) }}"
                    x-show="visible < {{ count($reviews) }}"
                    class="px-6 py-3 rounded-md border border-[#0A8B6C] text-[#0A8B6C]
                           text-sm md:text-base font-semibold hover:bg-[#0A8B6C] hover:text-white
                           transition">
                    Load More...
                </button>
            </div>
            @endif

        </div>
    </div>
</section>