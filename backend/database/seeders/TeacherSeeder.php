<?php

namespace Database\Seeders;

use App\Models\TeacherCourse;
use App\Models\TeacherProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        TeacherProfile::create([
            'user_id' => 2,
            'nip' => '0987654321',
            'academic_title' => 'M.Pd',
            'full_name' => 'Kayla Lil Firdausy',
        ]);

        TeacherProfile::create([
            'user_id' => 4,
            'nip' => '6281039563',
            'academic_title' => 'S.Pd',
            'full_name' => 'Ar Sakha Ransi Alden Bogar',
        ]);

        TeacherProfile::create([
            'user_id' => 5,
            'nip' => '3859103756',
            'academic_title' => 'S.Pd',
            'full_name' => 'Kevin Sanjaya',
        ]);

        TeacherProfile::create([
            'user_id' => 6,
            'nip' => '4729371042',
            'academic_title' => 'M.Pd',
            'full_name' => 'Tom Holland',
        ]);

        TeacherCourse::create([
            'teacher_profile_id' => 1,
            'course_id' => 1,
        ]);
        
        TeacherCourse::create([
            'teacher_profile_id' => 2,
            'course_id' => 2,
        ]);

        TeacherCourse::create([
            'teacher_profile_id' => 3,
            'course_id' => 3,
        ]);

        TeacherCourse::create([
            'teacher_profile_id' => 4,
            'course_id' => 4,
        ]);
        
    }
}
