@php
    $banners = [
        (object) [
            'title' => 'Safe, Reliable, and Compassionate Transportation.',
            'slogan' =>
                'Supporting seniors, dialysis patients, and families with dignity, comfort, and professional care.',
            'img' => 'images/banner.png',
        ],
    ];
@endphp

<div class="relative z-30 w-full h-auto overflow-x-hidden">
    @foreach ($banners as $item)
        <div>
            <img src="{{ asset($item->img) }}" alt="" class="w-full h-auto">
        </div>


        <div class="absolute inset-0 w-full h-full bg-black/70 backdrop-blur-[2px] z-10">
        </div>

        <div class="absolute bottom-0 left-0 z-20">
            <img src="{{ asset('images/banner-floater.png') }}" alt="">
        </div>

        <div
            class="container absolute inset-0 z-30 flex flex-col items-end justify-center w-full h-full gap-5 pt-10 mx-auto text-white text-start">
            <div class=" w-[45%] flex flex-col gap-5">
                <div class="font-bold leading-tight text-7xl text-start">
                    {{ $item->title }}
                </div>
                <div class="w-full">
                    <span class="w-[20%] text-2xl text-start leading-tight font-light">
                        {{ $item->slogan }}
                    </span>
                </div>
                <button
                    class="flex items-center w-fit gap-2 bg-[#19957b] hover:bg-[#007748] px-6 py-3 rounded-md text-lg font-medium transition">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" class="size-6">
                        <path fill="currentColor"
                            d="m255.43 117l-14-35a15.93 15.93 0 0 0-14.85-10H192v-8a8 8 0 0 0-8-8H32a16 16 0 0 0-16 16v112a16 16 0 0 0 16 16h17a32 32 0 0 0 62 0h50a32 32 0 0 0 62 0h17a16 16 0 0 0 16-16v-64a7.9 7.9 0 0 0-.57-3M80 208a16 16 0 1 1 16-16a16 16 0 0 1-16 16m56-80h-16v16a8 8 0 0 1-16 0v-16H88a8 8 0 0 1 0-16h16V96a8 8 0 0 1 16 0v16h16a8 8 0 0 1 0 16m56 80a16 16 0 1 1 16-16a16 16 0 0 1-16 16m0-96V88h34.58l9.6 24Z" />
                    </svg>
                    Book a Ride
                </button>
            </div>
        </div>
    @endforeach
</div>
