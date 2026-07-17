<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Bikin Akun Admin Utama
        User::create([
            'name' => 'Ataro (Admin)',
            'email' => 'atarotheatr7@gmail.com',
            'password' => Hash::make('12345678'), // Password default
            'role' => 'admin',
        ]);

        // 2. Bikin Akun Siswa untuk Uji Coba Kuis
        User::create([
            'name' => 'Ahmad',
            'email' => 'ahmad@gmail.com',
            'password' => Hash::make('12345678'), // Password default
            'role' => 'siswa',
        ]);
    }
}