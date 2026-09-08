<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\MajorCourse;
use App\Models\Major;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MajorCourseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Major::create([
            'name' => 'Rekayasa Perangkat Lunak',
        ]);

        Major::create([
            'name' => 'Akuntansi',
        ]);

        // ----------------------------------------------------------------------

        Course::create([
            'name' => 'Matematika',
            'slug' => 'matematika'
        ]);

        Course::create([
            'name' => 'Ilmu Pengetahuan Alam',
            'slug' => 'ilmu-pengetahuan-alam'
        ]);

        Course::create([
            'name' => 'Bahasa Indonesia',
            'slug' => 'bahasa-indonesia'
        ]);

        Course::create([
            'name' => 'Bahasa Inggris',
            'slug' => 'bahasa-inggris'
        ]);

        Course::create([
            'name' => 'Pendidikan Kewarganegaraan',
            'slug' => 'pendidikan-kewarganegaraan'
        ]);

        // ----------------------------------------------------------------------
        
        MajorCourse::create([
            'major_id' => 1,
            'course_id' => 1,
        ]);

        MajorCourse::create([
            'major_id' => 1,
            'course_id' => 2,
        ]);

        MajorCourse::create([
            'major_id' => 1,
            'course_id' => 3,
        ]);

        MajorCourse::create([
            'major_id' => 1,
            'course_id' => 4,
        ]);

        MajorCourse::create([
            'major_id' => 2,
            'course_id' => 1,
        ]);

        MajorCourse::create([
            'major_id' => 1,
            'course_id' => 5,
        ]);
    }
}
