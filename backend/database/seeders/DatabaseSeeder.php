<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Lesson;
use App\Models\Major;
use App\Models\MajorLesson;
use App\Models\StudentProfile;
use App\Models\TeacherLesson;
use App\Models\TeacherProfile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'email' => 'nabilkevin590@gmail.com',
            'password' => bcrypt('nabil123'),
            'role' => 'student'
        ]);
        User::create([
            'email' => 'kaylalil590@gmail.com',
            'password' => bcrypt('kayla123'),
            'role' => 'teacher'
        ]);
        User::create([
            'email' => 'admin590@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin'
        ]);

        Major::create([
            'name' => 'Rekayasa Perangkat Lunak',
        ]);

        Lesson::create([
            'name' => 'Matematika',
        ]);

        Classroom::create([
            'major_id' => 1,
            'grade_level' => 12,
            'name' => 'XII RPL 1',
        ]);

        MajorLesson::create([
            'major_id' => 1,
            'lesson_id' => 1,
        ]);

        StudentProfile::create([
            'user_id' => 1,
            'nis' => '1234567890',
            'class_id' => 1,
            'full_name' => 'Nabil Kevin Ramadhan',
            'photo_url' => 'photos/b7c9e1d4f2a8b3c5e7d9f1a3b5c7d9e1f3a5b7c9.png',
        ]);

        TeacherProfile::create([
            'user_id' => 2,
            'nip' => '0987654321',
            'academic_title' => 'M.Pd',
            'full_name' => 'Kayla Lil Firdausy',
        ]);

        TeacherLesson::create([
            'teacher_profile_id' => 1,
            'lesson_id' => 1,
        ]);
    }
}
