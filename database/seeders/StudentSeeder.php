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
            'nama_ortu' => 'Ortu A',
        ]);

        Student::create([
            'name' => 'B',
            'classroom_id' => 2,
            'nama_ortu' => 'Ortu B',
        ]);

        Student::create([
            'name' => 'C',
            'classroom_id' => 3,
            'nama_ortu' => 'Ortu C',
        ]);

        Student::create([
            'name' => 'D',
            'classroom_id' => 4,
            'nama_ortu' => 'Ortu D',
        ]);

        Student::create([
            'name' => 'E',
            'classroom_id' => 5,
            'nama_ortu' => 'Ortu E',
        ]);
    }
}
