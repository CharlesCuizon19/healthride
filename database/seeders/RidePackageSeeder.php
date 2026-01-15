<?php

namespace Database\Seeders;

use App\Models\RidePackage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RidePackageSeeder extends Seeder
{
    public function run()
    {
        $packages = [
            [
                'title' => 'Ambulator Transport',
                'image' => 'images/transportation1.png',
                'rows' => [
                    ['label' => 'Local (within 10 miles)', 'price' => '$60', 'suffix' => 'one-way'],
                    ['label' => 'Extended (within 11–20 miles)', 'price' => '$75', 'suffix' => 'one-way'],
                    ['label' => 'Over 20 miles', 'price' => 'custom quote', 'suffix' => null],
                ],
            ],
            [
                'title' => 'Wheelchair Transport',
                'image' => 'images/transportation2.png',
                'rows' => [
                    ['label' => 'Local (within 10 miles)', 'price' => '$60', 'suffix' => 'one-way'],
                    ['label' => 'Extended (within 11–20 miles)', 'price' => '$75', 'suffix' => 'one-way'],
                    ['label' => 'Over 20 miles', 'price' => 'custom quote', 'suffix' => null],
                ],
            ],
            [
                'title' => 'Special Services',
                'image' => 'images/transportation3.png',
                'rows' => [
                    ['label' => 'Dialysis Roundtrip Package (3 rides)', 'price' => '$160', 'suffix' => '/week'],
                    ['label' => "Doctor's Appointments / Lab Visits", 'price' => '$65–$75', 'suffix' => null],
                ],
            ],
        ];

        foreach ($packages as $packageData) {
            $rows = $packageData['rows'];
            unset($packageData['rows']);

            $package = RidePackage::create($packageData);
            $package->rows()->createMany($rows);
        }
    }
}
