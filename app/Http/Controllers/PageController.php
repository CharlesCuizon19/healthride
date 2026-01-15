<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function aboutUs()
    {
        return view('pages.about-us');
    }

    public function services()
    {
        $services = [
            1 => [
                'title' => 'Dialysis Transportation',
                'description' => 'Safe and reliable transportation for routine dialysis visits.',
                'image' => 'images/service1.png',
            ],
            2 => [
                'title' => 'Doctor & Specialist Appointments',
                'description' => 'Convenient and timely rides to your medical providers.',
                'image' => 'images/service2.png',
            ],
            3 => [
                'title' => 'Assisted Living & Skilled Nursing Transfers',
                'description' => 'Comfortable and supportive transfers between facilities.',
                'image' => 'images/service3.png',
            ],
            4 => [
                'title' => 'Hospital Discharges',
                'description' => 'Safe transport home after hospital discharge.',
                'image' => 'images/service4.png',
            ],
            5 => [
                'title' => 'Pharmacy / Lab / Errands',
                'description' => 'Quick transport for prescriptions, labs, and essential errands.',
                'image' => 'images/service5.png',
            ],
            6 => [
                'title' => 'Wheelchair Accessible Van',
                'description' => 'Fully equipped ADA-compliant vans for mobility assistance.',
                'image' => 'images/service6.png',
            ],
        ];

        return view('pages.services', compact('services'));
    }



    public function destinations()
    {
        $ridePackages = [
            1 => [
                'title' => 'Ambulator Transport',
                'image' => 'images/transportation1.png',
                'button_label' => 'Book Ambulator Transport',
                'rows' => [
                    [
                        'label' => 'Local (within 10 miles)',
                        'price' => '$60',
                        'suffix' => 'one-way',
                        'icon'  => 'images/location1-icon.png',
                    ],
                    [
                        'label' => 'Extended (within 11–20 miles)',
                        'price' => '$75',
                        'suffix' => 'one-way',
                        'icon'  => 'images/location-extended-icon.png',
                    ],
                    [
                        'label' => 'Over 20 miles',
                        'price' => 'custom quote',
                        'suffix' => '',
                        'icon'  => 'images/custom-icon.png',
                    ],
                ],
            ],

            2 => [
                'title' => 'Wheelchair Transport',
                'image' => 'images/transportation2.png',
                'button_label' => 'Book Wheelchair Transport',
                'rows' => [
                    [
                        'label' => 'Local (within 10 miles)',
                        'price' => '$60',
                        'suffix' => 'one-way',
                        'icon'  => 'images/location1-icon.png',
                    ],
                    [
                        'label' => 'Extended (within 11–20 miles)',
                        'price' => '$75',
                        'suffix' => 'one-way',
                        'icon'  => 'images/location-extended-icon.png',
                    ],
                    [
                        'label' => 'Over 20 miles',
                        'price' => 'custom quote',
                        'suffix' => '',
                        'icon'  => 'images/custom-icon.png',
                    ],
                ],
            ],

            3 => [
                'title' => 'Special Services',
                'image' => 'images/transportation3.png',
                'button_label' => 'Book Special Services',
                'rows' => [
                    [
                        'label' => 'Dialysis Roundtrip Package (3 rides)',
                        'price' => '$160',
                        'suffix' => '/week',
                        'icon'  => 'images/car-icon.png',
                    ],
                    [
                        'label' => "Doctor's Appointments / Lab Visits",
                        'price' => '$65–$75',
                        'suffix' => '',
                        'icon'  => 'images/lab-icon.png',
                    ],
                ],
            ],
        ];

        return view('pages.destinations', compact('ridePackages'));
    }


    public function reviews()
    {
        $reviews = [
            [
                'name'   => 'Robert G.',
                'role'   => 'Post-Surgery Passenger',
                'avatar' => 'images/avatar.png',
                'quote'  => '“I needed reliable transport after a surgery, and HealthRide truly went above and beyond. The driver helped me with every step, ensuring I was comfortable from pickup to drop-off. Their compassion and professionalism make every ride stress-free. I highly recommend them to anyone needing consistent medical transport.”',
            ],
            [
                'name'   => 'Maria L.',
                'role'   => 'Patient',
                'avatar' => 'images/avatar.png',
                'quote'  => '“HealthRide made my weekly therapy trips so much easier. The driver was always on time, patient, and incredibly kind. I’ve used other transport services before, but none matched the level of care and comfort HealthRide provides. It feels reassuring knowing I’m in safe hands every time.”',
            ],
            [
                'name'   => 'Leonora D.',
                'role'   => 'Patient',
                'avatar' => 'images/avatar.png',
                'quote'  => '“I rely on HealthRide for my specialist appointments every month, and they always deliver exceptional service. The drivers are friendly, the vehicles are comfortable, and they make sure I arrive on time every single trip. It’s comforting to know I can count on them.”',
            ],
            [
                'name'   => 'Marianne L.',
                'role'   => 'Dialysis Patient',
                'avatar' => 'images/avatar.png',
                'quote'  => '“I’ve been using HealthRide for over a year now, and I can honestly say their service has made my weekly dialysis trips so much easier. The drivers are always on time, kind, and respectful. They help me in and out of the vehicle with care, and I feel completely safe every ride.”',
            ],
            [
                'name'   => 'James C.',
                'role'   => 'Senior Citizen',
                'avatar' => 'images/avatar.png',
                'quote'  => '“My father relies on HealthRide for his doctor visits, and we couldn’t be happier. Their staff always communicates clearly and shows real compassion. It gives me peace of mind knowing he’s in good hands from pickup to drop-off.”',
            ],
            [
                'name'   => 'Alyssa M.',
                'role'   => 'Caregiver',
                'avatar' => 'images/avatar.png',
                'quote'  => '“We frequently coordinate with HealthRide for patient discharges, and their professionalism stands out. They’re efficient, responsive, and truly understand patient care logistics. Their drivers are courteous and always make the transition smooth for patients and families.”',
            ],
            [
                'name'   => 'Ronald B..',
                'role'   => 'Patient',
                'avatar' => 'images/avatar.png',
                'quote'  => '“Our residents use HealthRide for medical appointments and lab trips. The feedback has been overwhelmingly positive. The team is punctual, patient, and maintains a high level of respect for our elderly residents.”',
            ],
        ];

        return view('pages.reviews', compact('reviews'));
    }


    public function contactUs()
    {
        return view('pages.contact-us');
    }

    public function servicesSinglePage($id)
    {
        // ✅ SAME STRUCTURE AS YOUR COMPONENT NEEDS (title, description, image)
        $services = [
            1 => [
                'title' => 'Dialysis Transportation',
                'description' => 'HealthRide Medical Transport provides dependable and comfortable transportation for patients requiring regular dialysis treatments...',
                'image' => 'images/service1.png',
            ],
            2 => [
                'title' => 'Doctor & Specialist Appointments',
                'description' => 'Reliable transportation to doctors and specialists with professional care.',
                'image' => 'images/service2.png',
            ],
            3 => [
                'title' => 'Hospital Discharges',
                'description' => 'Safe and comfortable transport when leaving the hospital.',
                'image' => 'images/service3.png',
            ],
            4 => [
                'title' => 'Hospital Discharges',
                'description' => 'Safe transport home after hospital discharge.',
                'image' => 'images/service4.png',
            ],
            5 => [
                'title' => 'Pharmacy / Lab / Errands',
                'description' => 'Quick transport for prescriptions, labs, and essential errands.',
                'image' => 'images/service5.png',
            ],
            6 => [
                'title' => 'Wheelchair Accessible Van',
                'description' => 'Fully equipped ADA-compliant vans for mobility assistance.',
                'image' => 'images/service6.png',
            ],
        ];

        // ✅ Ensure valid ID
        abort_if(!isset($services[$id]), 404);

        // ✅ Current service for single page (keep banner_image if your single page uses it)
        $service = (object) [
            'id' => $id,
            'title' => $services[$id]['title'],
            'description' => $services[$id]['description'],
            'banner_image' => asset($services[$id]['image']), // banner is the same as image
        ];

        $features = [
            'On-Time Pickups & Drop-Offs',
            'Wheelchair-Accessible Vehicles',
            'Caring, Trained Staff',
            'Flexible Scheduling',
        ];

        $gallery = [
            asset('images/gallery-service.png'),
            asset('images/gallery-service.png'),
            asset('images/gallery-service.png'),
        ];

        // ✅ Other services (for cards/related section)
        $otherServices = collect($services)
            ->except($id)
            ->map(function ($s, $key) {
                return [
                    'title' => $s['title'],
                    'img'   => asset($s['image']),
                    'url'   => route('servicesSinglePage', $key),
                ];
            })
            ->values()
            ->toArray();

        // ✅ If your single page also needs the list for the component, pass $services too
        // (optional; remove if not needed)
        return view('pages.services-single-page', compact(
            'service',
            'features',
            'gallery',
            'otherServices',
            'services'
        ));
    }
    public function destinationsSinglePage($id)
    {
        $ridePackages = [
            1 => [
                'title' => 'Ambulator Transport',
                'description' => 'Our Ambulator Transport is designed for patients who can walk with little or no assistance but still need safe, dependable transportation to and from medical appointments. Whether it’s for a doctor’s visit, therapy session, or follow-up care, HealthRide ensures every ride is comfortable, timely, and stress-free.',
                'image' => 'images/transportation1.png',
                'button_label' => 'Book Now',
                'button_url' => '#',
                'rows' => [
                    [
                        'label' => 'Local (within 10 miles)',
                        'price' => '$60',
                        'suffix' => 'one-way',
                        'icon'  => 'images/location1-icon.png',
                    ],
                    [
                        'label' => 'Extended (within 11–20 miles)',
                        'price' => '$75',
                        'suffix' => 'one-way',
                        'icon'  => 'images/location-extended-icon.png',
                    ],
                    [
                        'label' => 'Over 20 miles',
                        'price' => 'custom quote',
                        'suffix' => '',
                        'icon'  => 'images/custom-icon.png',
                    ],
                ],
            ],

            2 => [
                'title' => 'Wheelchair Transport',
                'description' => 'Wheelchair Transport provides safe, comfortable, and fully accessible vehicles for passengers who require wheelchair assistance. Our trained drivers ensure a smooth ride from pick-up to drop-off while maintaining the highest safety standards.',
                'image' => 'images/transportation2.png',
                'button_label' => 'Book Now',
                'button_url' => '#',
                'rows' => [
                    [
                        'label' => 'Local (within 10 miles)',
                        'price' => '$60',
                        'suffix' => 'one-way',
                        'icon'  => 'images/location1-icon.png',
                    ],
                    [
                        'label' => 'Extended (within 11–20 miles)',
                        'price' => '$75',
                        'suffix' => 'one-way',
                        'icon'  => 'images/location-extended-icon.png',
                    ],
                    [
                        'label' => 'Over 20 miles',
                        'price' => 'custom quote',
                        'suffix' => '',
                        'icon'  => 'images/custom-icon.png',
                    ],
                ],
            ],

            3 => [
                'title' => 'Special Services',
                'description' => 'Special Services are tailored for patients with recurring medical needs, such as dialysis or multiple weekly appointments. Flexible scheduling ensures that patients arrive on time and in comfort, with personalized assistance every step of the way.',
                'image' => 'images/transportation3.png',
                'button_label' => 'Book Now',
                'button_url' => '#',
                'rows' => [
                    [
                        'label' => 'Dialysis Roundtrip Package (3 rides)',
                        'price' => '$160',
                        'suffix' => '/week',
                        'icon'  => 'images/car-icon.png',
                    ],
                    [
                        'label' => "Doctor's Appointments / Lab Visits",
                        'price' => '$65–$75',
                        'suffix' => '',
                        'icon'  => 'images/lab-icon.png',
                    ],
                ],
            ],
        ];

        $reviews = [
            [
                'name' => 'Robert G.',
                'passengerType' => 'Post-Surgery Passenger',
                'avatar' => 'images/avatar.png',
                'statement' => 'I needed reliable transport after a surgery, and HealthRide truly went above and beyond. The driver helped me with every step, ensuring I was comfortable from pickup to drop-off. Their compassion and professionalism make every ride stress-free. I highly recommend them to anyone needing consistent medical transport.',
            ],
            [
                'name' => 'Maria L.',
                'passengerType' => 'Patient',
                'avatar' => 'images/avatar.png',
                'statement' => 'HealthRide made my weekly therapy trips so much easier. The driver was always on time, patient, and incredibly kind. I’ve used other transport services before, but none matched the level of care and comfort HealthRide provides. It feels reassuring knowing I’m in safe hands every time.',
            ],
            [
                'name' => 'Leonora D.',
                'passengerType' => 'Patient',
                'avatar' => 'images/avatar.png',
                'statement' => 'I rely on HealthRide for my specialist appointments every month, and they always deliver exceptional service. The drivers are friendly, the vehicles are comfortable, and they make sure I arrive on time every single trip. It’s comforting to know I can count on them.',
            ],
        ];

        abort_if(!isset($ridePackages[$id]), 404);

        $destination = (object) [
            'id' => $id,
            'title' => $ridePackages[$id]['title'],
            'description' => $ridePackages[$id]['description'], // ✅ dynamic
            'image' => asset($ridePackages[$id]['image']),
            'button_label' => $ridePackages[$id]['button_label'],
            'button_url' => $ridePackages[$id]['button_url'],
            'rows' => $ridePackages[$id]['rows'],
        ];

        $otherDestinations = collect($ridePackages)
            ->except($id)
            ->map(function ($p, $key) {
                return [
                    'title' => $p['title'],
                    'img'   => asset($p['image']),
                    'url'   => route('destinationsSinglePage', $key),
                ];
            })
            ->values()
            ->toArray();

        return view('pages.destination-single-page', compact('destination', 'otherDestinations', 'reviews'));
    }


    public function bookARide()
    {
        return view('pages.book-a-ride');
    }
}
