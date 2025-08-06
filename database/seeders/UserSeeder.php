<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create default admin user
        User::updateOrCreate(
            ['email' => 'yousef@example.com'],
            [
                'name' => 'Yousef Admin',
                'username' => 'Joo611',
                'mobile' => '01123223217',
                'email' => 'yousef@example.com',
                'password' => Hash::make('123456'), // Change this password!
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        User::updateOrCreate(
            ['email' => 'yehia@example.com'],
            [
                'name' => 'Yehia User',
                'username' => 'yehia611',
                'mobile' => '01123223219',
                'email' => 'yehia@example.com',
                'password' => Hash::make('123456'), // Change this password!
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
