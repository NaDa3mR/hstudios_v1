<?php

namespace Database\Seeders;

use App\Models\Career;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CareerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $careers = [
            [
                'title' => 'Senior Laravel Developer',
                'currency' => 'USD',
                'type' => 'Full-time',
                'experience_level' => 'Senior',
                'details' => 'Responsible for backend development and API integration.',
                'min_salary' => 4000,
                'max_salary' => 6000,
                'is_active' => true,
                'is_published' => true,
            ],
            [
                'title' => 'Junior Frontend Developer',
                'currency' => 'EUR',
                'type' => 'Part-time',
                'experience_level' => 'Junior',
                'details' => 'Assist in building and maintaining web interfaces using Vue.js.',
                'min_salary' => 1000,
                'max_salary' => 2000,
                'is_active' => true,
                'is_published' => false,
            ],
            // Add more jobs if needed
        ];

        foreach ($careers as $career) {
            Career::create($career);
        }
    }
}
