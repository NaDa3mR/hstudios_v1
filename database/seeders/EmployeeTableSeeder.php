<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = [
            [
                'name' => 'Sarah Ahmed',
                'email' => 'sarah@example.com',
                'phone' => '01012345678',
                'job' => 'Frontend Developer',
                'linkedin' => 'https://linkedin.com/in/sarah',
                'github' => 'https://github.com/sarahdev',
                'behance' => 'https://behance.net/sarahdesign',
                'salary' => 12000.00,
            ],
            [
                'name' => 'Mohamed Youssef',
                'email' => 'mohamed@example.com',
                'phone' => '01087654321',
                'job' => 'Backend Developer',
                'linkedin' => 'https://linkedin.com/in/mohamed',
                'github' => 'https://github.com/mohameddev',
                'behance' => null,
                'salary' => 14000.00,
            ],
        ];

        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}
