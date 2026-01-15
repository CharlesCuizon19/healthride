<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            [
                'email' => 'hello@rweb.solutions',
            ],
            [
                'name' => 'Administrator',
                'password' => Hash::make('*'),
                'email_verified_at' => now(),
            ]
        );
    }
}
