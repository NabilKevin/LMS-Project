<?php

namespace Database\Seeders;

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
        $this->call([
            UserSeeder::class,
            MajorCourseSeeder::class,
            ClassroomSeeder::class,
            StudentSeeder::class,
            TeacherSeeder::class,
            ClassAssignmentSeeder::class,
            TopicsSeeder::class,
            AttachmentSeeder::class,
            StudentProgressSeeder::class,
        ]);
    }
}
