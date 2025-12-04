@extends('layouts.app')

@php
    $transportations = [
        (object) [
            'name' => 'Ambulator Transport',
            'img' => 'images/transportation1.png', // your image path here
            'pricing' => [
                (object) [
                    'label' => 'Local (within 10 miles)',
                    'price' => '$60',
                    'type' => 'one-way',
                    'icon' => 'location-icon.svg',
                ],
                (object) [
                    'label' => 'Extended (within 11-20 miles)',
                    'price' => '$75',
                    'type' => 'one-way',
                    'icon' => 'distance-icon.svg',
                ],
                (object) [
                    'label' => 'Over 20 miles',
                    'price' => 'custom quote',
                    'type' => null,
                    'icon' => 'mileage-icon.svg',
                ],
            ],
            'button_text' => 'Book Ambulator Transport',
        ],
        (object) [
            'name' => 'Wheelchair Transport',
            'img' => 'images/transportation2.png', // your image path here
            'pricing' => [
                (object) [
                    'label' => 'Local (within 10 miles)',
                    'price' => '$60',
                    'type' => 'one-way',
                    'icon' => 'location-icon.svg',
                ],
                (object) [
                    'label' => 'Extended (within 11-20 miles)',
                    'price' => '$75',
                    'type' => 'one-way',
                    'icon' => 'distance-icon.svg',
                ],
                (object) [
                    'label' => 'Over 20 miles',
                    'price' => 'custom quote',
                    'type' => null,
                    'icon' => 'mileage-icon.svg',
                ],
            ],
            'button_text' => 'Book Wheelchair Transport',
        ],
        (object) [
            'name' => 'Special Services',
            'img' => 'images/transportation3.png', // your image path here
            'pricing' => [
                (object) [
                    'label' => 'Local (within 10 miles)',
                    'price' => '$60',
                    'type' => 'one-way',
                    'icon' => 'location-icon.svg',
                ],
                (object) [
                    'label' => 'Extended (within 11-20 miles)',
                    'price' => '$75',
                    'type' => 'one-way',
                    'icon' => 'distance-icon.svg',
                ],
                (object) [
                    'label' => 'Over 20 miles',
                    'price' => 'custom quote',
                    'type' => null,
                    'icon' => 'mileage-icon.svg',
                ],
            ],
            'button_text' => 'Book Special Services',
        ],
    ];

    $services = [
        (object) [
            'name' => 'Dialysis Transportation',
            'img' => 'images/service1.png',
        ],
        (object) [
            'name' => 'Doctor & Specialist Appointments',
            'img' => 'images/service2.png',
        ],
        (object) [
            'name' => 'Assisted Living & Skilled Nursing Transfers',
            'img' => 'images/service3.png',
        ],
        (object) [
            'name' => 'Hospital Discharges',
            'img' => 'images/service4.png',
        ],
        (object) [
            'name' => 'Pharmacy / Lab / Errands',
            'img' => 'images/service5.png',
        ],
        (object) [
            'name' => 'Wheelchair Accessible Van',
            'img' => 'images/service6.png',
        ],
    ];

    $reviews = [
        (object) [
            'name' => 'Maria L.',
            'passengerType' => 'Patient',
            'avatar' => 'images/avatar.png',
            'statement' =>
                '“HealthRide made my weekly therapy trips so much easier. The driver was always on time, patient, and incredibly kind. I’ve used other transport services before, but none matched the level of care and comfort HealthRide provides. It feels reassuring knowing I’m in safe hands every time.”',
        ],
    ];
@endphp

@section('content')
    <div>
        <x-banner />

        <div class="flex bg-[#f9f9f9] flex-col gap-10 h-full">
            <div class="container relative h-full mx-auto ">
                <div class="absolute z-40 w-full -top-32">
                    <div class="grid grid-cols-1 gap-7 lg:grid-cols-3">
                        @foreach ($transportations as $item)
                            <div
                                class="overflow-hidden border hover:border hover:drop-shadow-md hover:border-[#19957b] transition duration-300  cursor-pointer rounded-xl group">
                                <div class="overflow-hidden">
                                    <img src="{{ asset($item->img) }}" alt=""
                                        class="group-hover:scale-105 transition duration-500 object-cover w-full h-[17rem]">
                                </div>
                                <div class="flex flex-col gap-4 p-5 bg-white">
                                    <span class="text-2xl font-bold">
                                        {{ $item->name }}
                                    </span>

                                    <div class="space-y-5 text-black/70">
                                        @foreach ($item->pricing as $prices)
                                            <div class="flex justify-between">
                                                <div class="flex gap-2">
                                                    @if ($prices->label === 'Local (within 10 miles)')
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"
                                                            class="text-[#19957b] size-6">
                                                            <path fill="currentColor"
                                                                d="M50.001 0C33.65 0 20.25 13.36 20.25 29.666c0 6.318 2.018 12.19 5.433 17.016L46.37 82.445c2.897 3.785 4.823 3.066 7.232-.2l22.818-38.83c.46-.834.822-1.722 1.137-2.629a29.3 29.3 0 0 0 2.192-11.12C79.75 13.36 66.354 0 50.001 0m0 13.9c8.806 0 15.808 6.986 15.808 15.766S58.807 45.43 50.001 45.43c-8.805 0-15.81-6.982-15.81-15.763S41.196 13.901 50 13.901" />
                                                            <path fill="currentColor"
                                                                d="m68.913 48.908l-.048.126l.042-.115zM34.006 69.057C19.88 71.053 10 75.828 10 82.857C10 92.325 26.508 100 50 100s40-7.675 40-17.143c0-7.029-9.879-11.804-24.004-13.8l-1.957 3.332C74.685 73.866 82 76.97 82 80.572c0 5.05-14.327 9.143-32 9.143s-32-4.093-32-9.143c-.001-3.59 7.266-6.691 17.945-8.174z"
                                                                color="currentColor" />
                                                        </svg>
                                                    @elseif ($prices->label === 'Extended (within 11-20 miles)')
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            class="text-[#19957b] size-6">
                                                            <path fill="currentColor"
                                                                d="M18 15a3 3 0 0 1 3 3a3 3 0 0 1-3 3a2.99 2.99 0 0 1-2.83-2H14v-2h1.17c.41-1.17 1.52-2 2.83-2m0 2a1 1 0 0 0-1 1a1 1 0 0 0 1 1a1 1 0 0 0 1-1a1 1 0 0 0-1-1m0-9a1.43 1.43 0 0 0 1.43-1.43a1.43 1.43 0 1 0-2.86 0A1.43 1.43 0 0 0 18 8m0-5.43a4 4 0 0 1 4 4C22 9.56 18 14 18 14s-4-4.44-4-7.43a4 4 0 0 1 4-4M8.83 17H10v2H8.83A2.99 2.99 0 0 1 6 21a3 3 0 0 1-3-3c0-1.31.83-2.42 2-2.83V14h2v1.17c.85.3 1.53.98 1.83 1.83M6 17a1 1 0 0 0-1 1a1 1 0 0 0 1 1a1 1 0 0 0 1-1a1 1 0 0 0-1-1M6 3a3 3 0 0 1 3 3c0 1.31-.83 2.42-2 2.83V10H5V8.83A2.99 2.99 0 0 1 3 6a3 3 0 0 1 3-3m0 2a1 1 0 0 0-1 1a1 1 0 0 0 1 1a1 1 0 0 0 1-1a1 1 0 0 0-1-1m5 14v-2h2v2zm-4-6H5v-2h2z" />
                                                        </svg>
                                                    @else
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            class="text-[#19957b] size-6">
                                                            <path fill="currentColor"
                                                                d="M13 15.5c0 2.28 1.7 4.91 2.91 6.5H6c-1.11 0-2-.89-2-2V4a2 2 0 0 1 2-2h1v7l2.5-1.5L12 9V2h6a2 2 0 0 1 2 2v6.22c-.5-.14-1-.22-1.5-.22c-3 0-5.5 2.5-5.5 5.5m9 0c0 2.6-3.5 6.5-3.5 6.5S15 18.1 15 15.5c0-1.9 1.6-3.5 3.5-3.5s3.5 1.6 3.5 3.5m-2.3.1c0-.6-.6-1.2-1.2-1.2s-1.2.5-1.2 1.2c0 .6.5 1.2 1.2 1.2s1.3-.6 1.2-1.2" />
                                                        </svg>
                                                    @endif
                                                    <span>
                                                        {{ $prices->label }}
                                                    </span>
                                                </div>
                                                <span class="flex items-center gap-1">
                                                    <span
                                                        class="{{ $prices->price === 'custom quote' ? '' : 'text-xl text-[#19957b] font-bold' }}">
                                                        {{ $prices->price }}
                                                    </span>
                                                    <span>
                                                        {{ $prices->type }}
                                                    </span>
                                                </span>
                                            </div>
                                        @endforeach
                                    </div>

                                    <button
                                        class="text-center font-bold mt-3 p-3 text-white w-full bg-[#19957b] hover:bg-[#0AA77F] transition duration-300 rounded-md">
                                        {{ $item->button_text }}
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="container grid grid-cols-1 gap-10 mx-auto lg:grid-cols-2 pt-[30rem] pb-[5rem]">
                <img src="{{ asset('images/aboutus-img.png') }}" alt="" class="w-auto h-full">
                <div class="flex flex-col gap-5">
                    <x-title title="About Us" />
                    <!-- Title -->
                    <h2 class="text-5xl font-extrabold w-[90%] text-[#0A1A3A] leading-tight ">
                        Caring Transportation, Every
                        Step of the Way
                    </h2>

                    <!-- Description -->
                    <p class="text-xl leading-relaxed text-gray-700 ">
                        At HealthRide Medical Transport LLC, we provide safe, reliable, and compassionate
                        non-emergency medical transportation. Our licensed team ensures every ride is
                        comfortable, punctual, and stress-free—whether it’s for therapy, hospital visits,
                        or regular check-ups. Your safety and peace of mind are our top priority.
                    </p>

                    <!-- Bullet List -->
                    <ul class="space-y-3 text-lg">
                        <li class="flex items-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                class="text-[#19957b]">
                                <g fill="none">
                                    <path
                                        d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                    <path fill="currentColor"
                                        d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2m3.535 6.381l-4.95 4.95l-2.12-2.121a1 1 0 0 0-1.415 1.414l2.758 2.758a1.1 1.1 0 0 0 1.556 0l5.586-5.586a1 1 0 0 0-1.415-1.415" />
                                </g>
                            </svg>
                            <span class="font-semibold">Cancer Treatment / Infusion Appointments</span>
                        </li>

                        <li class="flex items-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                class="text-[#19957b]">
                                <g fill="none">
                                    <path
                                        d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                    <path fill="currentColor"
                                        d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2m3.535 6.381l-4.95 4.95l-2.12-2.121a1 1 0 0 0-1.415 1.414l2.758 2.758a1.1 1.1 0 0 0 1.556 0l5.586-5.586a1 1 0 0 0-1.415-1.415" />
                                </g>
                            </svg>
                            <span class="font-semibold">Physical Therapy Patients</span>
                        </li>

                        <li class="flex items-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                class="text-[#19957b]">
                                <g fill="none">
                                    <path
                                        d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                    <path fill="currentColor"
                                        d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2m3.535 6.381l-4.95 4.95l-2.12-2.121a1 1 0 0 0-1.415 1.414l2.758 2.758a1.1 1.1 0 0 0 1.556 0l5.586-5.586a1 1 0 0 0-1.415-1.415" />
                                </g>
                            </svg>
                            <span class="font-semibold">Post-Surgery Recovery Patients</span>
                        </li>
                    </ul>

                    <!-- Button -->
                    <a href="#"
                        class="inline-flex items-center group gap-2 bg-[#19957b] w-fit text-white px-6 py-3 rounded-md text-base font-medium hover:bg-[#0AA77F] transition">
                        <span>
                            More About Us
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            class="transition duration-300 group-hover:translate-x-1 group-hover:rotate-45">
                            <path fill="currentColor"
                                d="M18 7.05a1 1 0 0 0-1-1L9 6a1 1 0 0 0 0 2h5.56l-8.27 8.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0L16 9.42V15a1 1 0 0 0 1 1a1 1 0 0 0 1-1Z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="bg-[#f4f4f4]">
            <div class="container flex flex-col gap-5 py-20 mx-auto">
                <div class="flex justify-center w-full">
                    <x-title title="Our Services" />
                </div>

                <div class="flex justify-center w-full">
                    <span class="text-[#071434] text-4xl font-bold text-center w-[50%]">
                        Comprehensive Non-Emergency Medical Transportation Services
                    </span>
                </div>

                <div class="grid grid-cols-1 mt-10 gap-7 md:grid-cols-2 xl:grid-cols-3 gap-y-20">
                    @foreach ($services as $item)
                        <a href="#" class="flex flex-col gap-5 group">
                            <div class="overflow-hidden rounded-lg">
                                <img src="{{ asset($item->img) }}" alt=""
                                    class="w-full object-cover h-[20rem] group-hover:scale-105 transition duration-500">
                            </div>
                            <div class="flex justify-between">
                                <span
                                    class="text-2xl font-bold text-[#071434] group-hover:text-[#19957b] transition duration-300">
                                    {{ $item->name }}
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    class="transition duration-300 group-hover:translate-x-1 group-hover:rotate-45 text-[#818181] size-8 group-hover:text-[#19957b]">
                                    <path fill="currentColor"
                                        d="M18 7.05a1 1 0 0 0-1-1L9 6a1 1 0 0 0 0 2h5.56l-8.27 8.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0L16 9.42V15a1 1 0 0 0 1 1a1 1 0 0 0 1-1Z" />
                                </svg>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="bg-[#f9f9f9]">
            <div class="flex flex-col gap-5 py-20">
                <div class="flex justify-center w-full">
                    <x-title title="Nurse-Led Infection Prevention Protocol" />
                </div>
                <div class="flex justify-center w-full">
                    <span class="text-[#071434] text-4xl font-bold text-center w-[50%]">
                        Designed for Dialysis & Cancer Care Patients
                    </span>
                </div>
                <div class="container grid grid-cols-5 gap-6 mx-auto mt-10">
                    <div class="relative col-span-2 overflow-hidden">
                        <div
                            class=" flex gap-5 flex-col px-7 py-10 w-full bg-[#f5f5f5] h-full rounded-xl justify-center items-center">
                            <img src="{{ asset('images/logo.png') }}" alt="" class="w-[16rem] h-auto">
                            <span class="text-lg leading-snug text-center text-black/80">
                                “Specialized transportation for medically fragile patients, protected with Nurse-Led
                                infection
                                control.”
                            </span>

                            <div class="p-8 mt-5 text-xl leading-relaxed bg-white rounded-lg text-black/80">
                                At HealthRide Medical Transport LLC, we specialize in transporting dialysis patients and
                                individuals receiving cancer infusion and chemotherapy treatments. These patients often have
                                weakened or medically-suppressed immune systems, which means they are at higher risk of
                                infection and cross-contamination during transportation. <br><br> To protect our passengers,
                                our
                                service
                                operates under a Nurse-Led Mobile Infection Prevention Protocol, developed and overseen by a
                                licensed nurse.
                            </div>
                        </div>
                        <img src="{{ asset('images/cross.png') }}" alt="" class="absolute -top-3 -left-3">
                        <img src="{{ asset('images/cross.png') }}" alt=""
                            class="absolute top-[10rem] left-8 size-4">
                        <img src="{{ asset('images/cross.png') }}" alt=""
                            class="absolute top-[5rem] left-[6rem] size-6">
                        <img src="{{ asset('images/cross.png') }}" alt=""
                            class="absolute -top-1 right-3 size-12">
                        <img src="{{ asset('images/cross.png') }}" alt=""
                            class="absolute top-[10rem] right-[4rem] size-7">
                        <img src="{{ asset('images/cross.png') }}" alt="" class="absolute bottom-0 left-2 ">
                        <img src="{{ asset('images/cross.png') }}" alt=""
                            class="absolute bottom-2 right-[12rem] size-5">
                        <img src="{{ asset('images/cross.png') }}" alt=""
                            class="absolute bottom-5 -right-1 size-12">
                    </div>
                    <div class="bg-[#071434] rounded-xl p-8 overflow-hidden col-span-3 z-10 relative">
                        <div>
                            <div class="max-w-4xl mx-auto space-y-10 text-white">

                                <!-- Section 1 -->
                                <div>
                                    <h3 class="mb-4 text-base font-semibold">This protocol includes:</h3>

                                    <ul class="ml-3 space-y-2 text-xl leading-relaxed">
                                        <li class="flex items-start gap-2">
                                            <span class="text-white">•</span>
                                            <span>Reducing cross-contamination between passengers</span>
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <span class="text-white">•</span>
                                            <span>Sanitizing high-touch surfaces between each transport</span>
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <span class="text-white">•</span>
                                            <span>Maintaining a clean, calm, and ventilated environment</span>
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <span class="text-white">•</span>
                                            <span>Using hospital-grade disinfectants (never strong perfumes)</span>
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <span class="text-white">•</span>
                                            <span>Ensuring drivers follow proper hand hygiene and PPE use as needed</span>
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <span class="text-white">•</span>
                                            <span>Upholding dignity and comfort during patient handling</span>
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <span class="text-white">•</span>
                                            <span>Supporting respiratory safety for vulnerable patients</span>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Section 2 -->
                                <div>
                                    <h3 class="mb-4 text-base font-semibold">
                                        This standard ensures a safe, comfortable, and medically-aware transportation
                                        experience for:
                                    </h3>

                                    <ul class="ml-3 space-y-2 text-xl leading-relaxed">
                                        <li class="flex items-start gap-2">
                                            <span class="text-white">•</span>
                                            <span>Dialysis treatment appointments</span>
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <span class="text-white">•</span>
                                            <span>Cancer treatment, infusion, and chemotherapy visits</span>
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <span class="text-white">•</span>
                                            <span>Post-hospital discharge transitions</span>
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <span class="text-white">•</span>
                                            <span>Senior and mobility-assisted transportation</span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="flex flex-col items-center justify-center w-full gap-5">
                                    <div class="flex items-center justify-center w-full gap-5">
                                        <div class="w-[5rem] h-1 bg-white"></div>
                                        <div class="text-4xl font-bold text-white">
                                            We don’t just transport. We care.
                                        </div>
                                        <div class="w-[5rem] h-1 bg-white"></div>
                                    </div>
                                    <div class="flex items-center font-semibold gap-3 text-[#19957b]">
                                        <span class="font-semibold">
                                            Clean
                                        </span>
                                        <span>•</span>
                                        <span class="font-semibold">
                                            Safe
                                        </span>
                                        <span>•</span>
                                        <span class="font-semibold">
                                            Dignified
                                        </span>
                                        <span>•</span>
                                        <span class="font-semibold">
                                            Nurse-Led Care
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div
                            class="absolute h-[10rem] xl:h-[35rem] -top-[5rem] -right-[5rem]  w-[500px] z-0 bg-[#4DFFA6]/10 rounded-full blur-3xl">
                        </div>
                        <div
                            class="absolute h-[10rem] xl:h-[35rem] -bottom-[20rem] -left-[10rem]  w-[500px] z-0 bg-[#4DFFA6]/10 rounded-full blur-3xl">
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="py-32 bg-[#f9f9f9]">
            <div class="relative">
                <img src="{{ asset('images/homepage-rectangle.png') }}" alt="" class="w-full h-auto">

                <div class="absolute inset-0 h-full">
                    <div class="container flex flex-col items-start justify-center h-full gap-5 mx-auto text-start">
                        <span class="text-[42px] font-bold leading-snug text-white w-[40%]">
                            Ready for a Safe and Comfortable Medical Ride?
                        </span>
                        <span class="text-lg leading-relaxed text-white w-[40%]">
                            Let HealthRide Medical Transport take care of your journey—because your health deserves a smooth
                            ride.
                        </span>
                        <button class="px-7 py-3 text-lg text-center font-bold text-[#19957b] bg-white rounded-lg">
                            Book Your Transport Now
                        </button>
                    </div>
                </div>

                <div class="absolute right-0 -top-16">
                    <div class="flex items-end justify-end w-full h-full">
                        <img src="{{ asset('images/homepage-car.png') }}" alt="" class=" w-[110vh] h-auto">
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-5 py-20 bg-[#f9f9f9]">
            <div class="flex justify-center w-full">
                <x-title title="Client Reviews" />
            </div>
            <div class="flex justify-center w-full">
                <span class="text-[#071434] text-4xl font-bold text-center w-[50%]">
                    What Our Passengers Say
                </span>
            </div>

            @foreach ($reviews as $item)
                <div class="flex flex-col gap-3 bg-white border rounded-lg">
                    <div class="flex flex-col gap-5 m-2 bg-white border">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-8 text-[#19957b]">
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M2.25 5A2.75 2.75 0 0 1 5 2.25h14A2.75 2.75 0 0 1 21.75 5v10A2.75 2.75 0 0 1 19 17.75H7.961c-.38 0-.739.173-.976.47l-2.33 2.913c-.798.996-2.405.433-2.405-.843zm7.231 5.75a4 4 0 0 1-.206.3c-.337.449-.796.91-1.305 1.42a.75.75 0 1 0 1.06 1.06l.022-.021c.484-.485 1.016-1.016 1.423-1.559s.775-1.205.775-1.95V8A1.75 1.75 0 0 0 9.5 6.25h-1A1.75 1.75 0 0 0 6.75 8v1c0 .966.784 1.75 1.75 1.75zm5.794.3q.12-.159.206-.3H14.5A1.75 1.75 0 0 1 12.75 9V8c0-.966.784-1.75 1.75-1.75h1c.966 0 1.75.784 1.75 1.75v2c0 .745-.368 1.407-.775 1.95s-.939 1.074-1.423 1.559l-.022.021a.75.75 0 1 1-1.06-1.06c.51-.51.968-.971 1.305-1.42"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="text-xl leading-snug">
                            {{ $item->statement }}
                        </span>
                    </div>
                    <div class="flex items-center gap-2">
                        <img src="{{ asset($item->avatar) }}" alt="" class="h-auto rounded-full w-14">
                        <div class="flex flex-col gap-2">
                            <span class="text-xl font-bold">
                                {{ $item->name }}
                            </span>
                            <span class="text-[#19957b] text-lg font-light">
                                {{ $item->passengerType }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
