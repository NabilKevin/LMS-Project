<?php

namespace Database\Seeders;

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
        // User::factory(10)->create();

        User::create([
            'email' => 'nabilkevin590@gmail.com',
            'password' => bcrypt('nabil123'),
            'role' => 'student'
        ]);
        User::create([
            'email' => 'nabilkeren590@gmail.com',
            'password' => bcrypt('nabil123'),
            'role' => 'teacher'
        ]);
        User::create([
            'email' => 'admin590@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin'
        ]);
    }
}
