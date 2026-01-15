<div class="relative w-full overflow-hidden
            h-[380px]
            sm:h-[320px]
            md:h-[420px]
            lg:h-[520px]
            xl:h-[650px]">

    <!-- BACKGROUND (full width always) -->
    <div class="absolute inset-0 z-0">
        <img
            src="{{ asset($background) }}"
            class="w-full h-full object-cover object-center">
    </div>

    <!-- CONTENT WRAPPER -->
    <div class="relative z-20 h-full max-w-screen-2xl mx-auto">

        <!-- TITLE -->
        <div class="absolute
                    left-4 bottom-6
                    sm:left-8 sm:bottom-10
                    md:left-2 md:bottom-12
                    lg:left-28 lg:bottom-24
                    xl:left-1 xl:top-[35rem] xl:bottom-auto">

            <h1 class="text-white font-bold
                       text-2xl
                       sm:text-3xl
                       md:text-4xl
                       lg:text-5xl">
                {{ $title }}
            </h1>

        </div>
    </div>

</div>