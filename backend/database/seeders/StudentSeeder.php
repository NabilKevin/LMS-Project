<?php

namespace Database\Seeders;

use App\Models\StudentProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        StudentProfile::create([
            'user_id' => 1,
            'nis' => '1234567890',
            'class_id' => 1,
            'full_name' => 'Nabil Kevin Ramadhan',
            'photo_path' => 'photos/b7c9e1d4f2a8b3c5e7d9f1a3b5c7d9e1f3a5b7c9.png',
        ]);
    }
}
