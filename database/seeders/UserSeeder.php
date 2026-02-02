<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@workforce.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        // Create Technician User
        User::create([
            'name' => 'Technician User',
            'username' => 'technician',
            'email' => 'technician@workforce.com',
            'password' => Hash::make('password'),
            'role' => 'technician',
            'status' => 'active',
            'email_verified_at' => now(),
        ]);
    }
}
