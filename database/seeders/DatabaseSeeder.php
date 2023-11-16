<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BankAccount;
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
            'img_path' => 'kategori/wqCBh48Y6rG7X5BjC9X02AAObv1smRRSLo7nZF4U.jpg'
        ]);
        Category::create([
            'category_name' => 'Wedding Organizer',
            'img_path' => 'kategori/C9G1I1QM5Q86NKmiJyCk69Zj54k4uRkCSewp7APD.jpg'
        ]);
        Category::create([
            'category_name' => 'Fotografer',
            'img_path' => 'kategori/hqqZXibtDvYWVzNGG7GOc1OJ60WRuenuAoG4uYPq.jpg'
        ]);

        BankAccount::create([
            'bank_name' => 'BCA'
        ]);
        BankAccount::create([
            'bank_name' => 'BRI'
        ]);
        BankAccount::create([
            'bank_name' => 'Mandiri'
        ]);
        BankAccount::create([
            'bank_name' => 'Gopay'
        ]);
        BankAccount::create([
            'bank_name' => 'ShopeePay'
        ]);
        BankAccount::create([
            'bank_name' => 'Dana'
        ]);
    }
}
