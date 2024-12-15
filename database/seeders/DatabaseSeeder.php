<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat user dengan role admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'), // Ganti dengan password yang aman
            'role' => 'admin', // Role admin
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Membuat user dengan role user
        User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('user123'), // Ganti dengan password yang aman
            'role' => 'user', // Role user
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Menambahkan user tambahan dengan role "user" menggunakan factory
        User::factory(10)->create([
            'role' => 'user', // Role user
        ]);
    }
}
