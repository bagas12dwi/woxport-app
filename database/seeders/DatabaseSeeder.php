<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Bagas Dwi',
            'email' => 'bag12dwi.s@gmail.com',
            'password' => bcrypt('123'),
            'role' => 'user',
            'phone' => '09372738'
        ]);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
            'role' => 'admin',
            'phone' => '09372738'
        ]);
        User::create([
            'name' => 'Alex Wedding',
            'email' => 'alex@gmail.com',
            'password' => bcrypt('123'),
            'role' => 'vendor',
            'phone' => '09372738'
        ]);

        Category::create([
            'category_name' => 'MUA',
            'img_path' => ''
        ]);
        Category::create([
            'category_name' => 'Wedding Organizer',
            'img_path' => ''
        ]);
        Category::create([
            'category_name' => 'Fotografer',
            'img_path' => ''
        ]);
    }
}
