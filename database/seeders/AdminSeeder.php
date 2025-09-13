<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat user admin default
        User::updateOrCreate(
            ['email' => 'admin@kliniklansia.com'],
            [
                'name' => 'Administrator',
                'email' => 'admin@kliniklansia.com',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]
        );

        // Buat user admin untuk development
        User::updateOrCreate(
            ['email' => 'admin@localhost'],
            [
                'name' => 'Admin Local',
                'email' => 'admin@localhost',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]
        );
    }
}
