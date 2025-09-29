<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'People',
            'email' => 'peopleone@gmail.com',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin12345'),
        ]);

        User::create([
            'name' => 'User',
            'email' => 'userone@gmail.com',
            'password' => Hash::make('user12345'),
        ]);
    }
}
