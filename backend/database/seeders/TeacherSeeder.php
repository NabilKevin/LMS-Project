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
            'title_suffix' => 'M.Pd',
            'full_name' => 'Kayla Lil Firdausy',
        ]);

        TeacherProfile::create([
            'user_id' => 4,
            'nip' => '6281039563',
            'title_suffix' => 'S.Pd',
            'full_name' => 'Ar Sakha Ransi Alden Bogar',
        ]);

        TeacherProfile::create([
            'user_id' => 5,
            'nip' => '3859103756',
            'title_suffix' => 'S.Pd',
            'full_name' => 'Kevin Sanjaya',
        ]);

        TeacherProfile::create([
            'user_id' => 6,
            'nip' => '4729371042',
            'title_suffix' => 'M.Pd',
            'full_name' => 'Tom Holland',
        ]);

        TeacherProfile::create([
            'user_id' => 7,
            'nip' => '482917583`',
            'title_suffix' => 'S.Pd',
            'full_name' => 'Tobey Maguire',
        ]);

        // ------------------------------------------------

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
        TeacherCourse::create([
            'teacher_profile_id' => 4,
            'course_id' => 5,
        ]);
        TeacherCourse::create([
            'teacher_profile_id' => 5,
            'course_id' => 5,
        ]);
        
    }
}
