<?php

namespace Database\Seeders;

use App\Models\Job_Application;
use App\Models\Candidate;
use App\Models\Career;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobApplicationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { $careers = Career::pluck('id')->toArray();
        $candidates = Candidate::limit(10)->get();

        foreach ($candidates as $candidate) {
            Job_Application::create([
                'career_id' => fake()->randomElement($careers),
                'candidate_id' => $candidate->id,
                'first_name' => $candidate->first_name,
                'last_name' => $candidate->last_name,
                'email' => $candidate->email,
                'phone' => $candidate->phone,
                'country' => $candidate->country,
                'city' => $candidate->city,
                'linkedin' => $candidate->linkedin,
                'github' => $candidate->github,
                'behance' => $candidate->behance,
            ]);
        }
    }
}
