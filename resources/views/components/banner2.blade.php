<div class="relative w-full h-[650px] overflow-hidden">

    <!-- BACKGROUND -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset($background) }}" class="w-full h-full object-contain">
    </div>
    <!-- TITLE -->
    <div class="absolute top-[30rem] left-40 z-30">
        <h1 class="text-white font-bold text-4xl md:text-5xl">
            {{ $title }}
        </h1>
    </div>
</div>