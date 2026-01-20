<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Update atau buat Admin 1
        User::updateOrCreate(
            ['email' => env('ADMIN1_EMAIL', 'admin1@boyongmilk.com')], // Kunci unik
            [
                'name' => env('ADMIN1_NAME', 'Admin 1'),
                'username' => env('ADMIN1_USERNAME', 'admin1'),
                'password' => Hash::make(env('ADMIN1_PASSWORD', 'password123')), // Gunakan env variable
            ]
        );

        // Update atau buat Admin 2
        User::updateOrCreate(
            ['email' => env('ADMIN2_EMAIL', 'admin2@boyongmilk.com')],
            [
                'name' => env('ADMIN2_NAME', 'Admin 2'),
                'username' => env('ADMIN2_USERNAME', 'admin2'),
                'password' => Hash::make(env('ADMIN2_PASSWORD', 'password123')), // Gunakan env variable
            ]
        );
    }
}
