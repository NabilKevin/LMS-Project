<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Classroom::create([
            'major_id' => 1,
            'grade_level' => 12,
            'name' => 'XII RPL 1',
        ]);

        Classroom::create([
            'major_id' => 2,
            'grade_level' => 12,
            'name' => 'XII AKL 1',
        ]);
    }
}
