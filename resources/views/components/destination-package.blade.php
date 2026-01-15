@props([
'heading' => 'Safe, Reliable, and Compassionate Medical Rides',
'packages' => [],
])

<section class="w-full bg-[#f9fbfd] pt-16 md:pt-20 pb-40 md:pb-40">
    <div class="max-w-screen-2xl mx-auto px-6 lg:px-10">

        {{-- Heading --}}
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-center text-[#071434] mb-10 md:mb-14">
            {{ $heading }}
        </h2>

        {{-- Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
            @foreach ($packages as $id => $package)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden flex flex-col h-full">

                {{-- Image --}}
                <div class="w-full h-52 md:h-60 lg:h-64">
                    <img src="{{ asset($package['image']) }}"
                        alt="{{ $package['title'] ?? '' }}"
                        class="w-full h-full object-cover">
                </div>

                {{-- Content --}}
                <div class="px-6 md:px-8 py-6 md:py-7 flex flex-col flex-1">

                    {{-- Title --}}
                    <h3 class="text-xl md:text-2xl font-bold text-[#071434] mb-4">
                        {{ $package['title'] ?? '' }}
                    </h3>

                    {{-- Rows --}}
                    <ul class="space-y-3 md:space-y-4 flex-1">
                        @foreach (($package['rows'] ?? []) as $row)
                        <li class="flex items-start justify-between gap-4 text-sm md:text-base">

                            {{-- Left side: icon + label --}}
                            <div class="flex items-start gap-3 text-gray-700">
                                <span class="mt-0.5 inline-flex items-center justify-center w-8 h-8 rounded-full bg-[#e6f7f2]">
                                    @if (!empty($row['icon']))
                                    <img src="{{ asset($row['icon']) }}"
                                        alt=""
                                        class="w-6 h-6 object-contain">
                                    @endif
                                </span>

                                <span>{{ $row['label'] ?? '' }}</span>
                            </div>

                            {{-- Right side: price + suffix --}}
                            <div class="text-right whitespace-nowrap">
                                @if (!empty($row['price']))
                                <span class="text-[#0A8B6C] font-semibold">
                                    {{ $row['price'] }}
                                </span>
                                @endif

                                @if (!empty($row['suffix']))
                                <span class="ml-1 text-xs md:text-sm text-gray-500">
                                    {{ $row['suffix'] }}
                                </span>
                                @endif
                            </div>

                        </li>
                        @endforeach
                    </ul>

                    {{-- Button (NOW USES ID ROUTE) --}}
                    <div class="mt-6">
                        <a href="{{ route('destinationsSinglePage', $id) }}"
                            class="inline-flex w-full items-center justify-center px-6 py-3 rounded-md
                                      bg-[#0A8B6C] hover:bg-[#06745a] text-white text-sm md:text-base font-semibold
                                      transition">
                            {{ $package['button_label'] ?? 'View Details' }}
                        </a>
                    </div>

                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>