<?php

namespace Database\Seeders;

use App\Models\ClassAssignment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassAssignmentSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        ClassAssignment::create([
            'class_id' => 1,
            'teacher_course_id' => 1,
            'academic_year' => '2026/2027',
        ]);

        ClassAssignment::create([
            'class_id' => 1,
            'teacher_course_id' => 2,
            'academic_year' => '2026/2027',
        ]);

        ClassAssignment::create([
            'class_id' => 1,
            'teacher_course_id' => 3,
            'academic_year' => '2026/2027',
        ]);

        ClassAssignment::create([
            'class_id' => 1,
            'teacher_course_id' => 4,
            'academic_year' => '2026/2027',
        ]);

        ClassAssignment::create([
            'class_id' => 1,
            'teacher_course_id' => 5,
            'academic_year' => '2026/2027',
        ]);

        ClassAssignment::create([
            'class_id' => 2,
            'teacher_course_id' => 1,
            'academic_year' => '2026/2027',
        ]);
    }
}
