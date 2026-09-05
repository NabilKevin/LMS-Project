<?php

namespace Database\Seeders;

use App\Models\StudentProgress;
use Illuminate\Database\Seeder;

class StudentProgressSeeder extends Seeder
{
    public function run(): void
    {
        StudentProgress::create([
            'class_topic_content_id' => 1,
            'student_profile_id' => 1,
            'is_completed' => true,
            'completed_at' => now(),
        ]);
    }
}
