<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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

        User::create([
            'email' => 'arsahka50@gmail.com',
            'password' => bcrypt('arsakha123'),
            'role' => 'teacher'
        ]);

        User::create([
            'email' => 'kevinsanjaya90@gmail.com',
            'password' => bcrypt('kevin123'),
            'role' => 'teacher'
        ]);
        
        User::create([
            'email' => 'tomholland59@gmail.com',
            'password' => bcrypt('tomholland123'),
            'role' => 'teacher'
        ]);

        User::create([
            'email' => 'tobey9@gmail.com',
            'password' => bcrypt('tobey123'),
            'role' => 'teacher'
        ]);
    }
}
