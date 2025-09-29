<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Teacher::create([
            'name' => 'Ms. A',
            'classroom_id' => 1,
        ]);

        Teacher::create([
            'name' => 'Mr. B',
            'classroom_id' => 2,
        ]);

        Teacher::create([
            'name' => 'Ms. C',
            'classroom_id' => 3,
        ]);

        Teacher::create([
            'name' => 'Mr. D',
            'classroom_id' => 4,
        ]);

        Teacher::create([
            'name' => 'Ms. E',
            'classroom_id' => 5,
        ]);
    }
}
