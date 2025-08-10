<?php

namespace Database\Seeders;

use App\Models\Candidate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $candidates = [
                [
                    'career_id' => 1,
                    'first_name' => 'Ahmed',
                    'last_name' => 'Hassan',
                    'email' => 'ahmed@example.com',
                    'phone' => '01012345678',
                    'country' => 'Egypt',
                    'city' => 'Cairo',
                    'linkedin' => 'https://linkedin.com/in/ahmedhassan',
                    'github' => 'https://github.com/ahmedhassan',
                    'behance' => 'https://behance.net/ahmedhassan',
                    'is_hired' => 0,
                ],
                [
                    'career_id' => 2,
                    'first_name' => 'Salma',
                    'last_name' => 'Mohamed',
                    'email' => 'salma@example.com',
                    'phone' => '01098765432',
                    'country' => 'Egypt',
                    'city' => 'Alexandria',
                    'linkedin' => 'https://linkedin.com/in/salmamohamed',
                    'github' => 'https://github.com/salmamohamed',
                    'behance' => null,
                    'is_hired' => 1,
                ],
            ];

            foreach ($candidates as $candidate) {
                Candidate::create($candidate);
            }
        }
    }

