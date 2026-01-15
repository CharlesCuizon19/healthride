@props([
'services' => [],
'heading' => 'Caring Transport Solutions for Every Need',
])

<section class="w-full bg-[#f9fafb] pt-16 md:pt-20 pb-40 md:pb-40">
    <div class="max-w-screen-2xl mx-auto px-4 md:px-6 lg:px-10">

        {{-- Heading --}}
        <h2 class="text-2xl md:text-3xl lg:text-5xl font-bold text-center text-[#071434] leading-tight mb-10 md:mb-12">
            {{ $heading }}
        </h2>

        {{-- Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 md:gap-10">
            @foreach ($services as $id => $service)
            <a href="{{ route('servicesSinglePage', $id) }}"
                class="group bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden flex flex-col hover:shadow-lg hover:-translate-y-1 transition-transform duration-200">

                {{-- Image --}}
                <div class="w-full h-52 md:h-60 lg:h-64 overflow-hidden">
                    <img src="{{ asset($service['image']) }}"
                        alt="{{ $service['title'] ?? '' }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                </div>


                {{-- Text --}}
                <div class="flex-1 flex flex-col justify-between px-5 md:px-6 pt-4 pb-5">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <h3 class="text-lg md:text-xl font-semibold text-[#071434] mb-1 leading-snug">
                                {{ $service['title'] ?? '' }}
                            </h3>

                            @if(!empty($service['description']))
                            <p class="text-sm md:text-base text-gray-600">
                                {{ $service['description'] }}
                            </p>
                            @endif
                        </div>

                        {{-- Arrow icon --}}
                        <span class="shrink-0 mt-1 text-[#0A8B6C] opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.7" d="M7 17L17 7m0 0H9m8 0v8" />
                            </svg>
                        </span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>