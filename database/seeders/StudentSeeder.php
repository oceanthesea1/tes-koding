<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'name' => 'A',
            'classroom_id' => 1,
        ]);

        Student::create([
            'name' => 'B',
            'classroom_id' => 2,
        ]);

        Student::create([
            'name' => 'C',
            'classroom_id' => 3,
        ]);

        Student::create([
            'name' => 'D',
            'classroom_id' => 4,
        ]);

        Student::create([
            'name' => 'E',
            'classroom_id' => 5,
        ]);
    }
}
