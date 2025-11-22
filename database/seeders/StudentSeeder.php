<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;
use App\Models\Type;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $studentType = Type::firstOrCreate([
            'name' => class_basename(Student::class), 
            'label' => class_basename(Student::class).' Type', 
            'description' => "This is the type used for students statuses."
        ]);

        $enabledStudentStatus = Status::firstOrCreate([
            'name' => 'enabled',
            'label' => 'Enabled',
            'type_id' => $studentType->id
        ]);

        $disabledStudentStatus = Status::firstOrCreate([
            'name' => 'disabled',
            'label' => 'Disabled',
            'type_id' => $studentType->id
        ]);

    }
}
