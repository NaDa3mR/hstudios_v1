<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\Career;
use App\Models\Job_Application;
use App\Models\Interview;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InterviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $careerIds = Career::pluck('id')->toArray();
        $jobAppIds = Job_Application::pluck('id')->toArray();
        $candidateIds = Candidate::pluck('id')->toArray();

        // Safety check so seeder won’t fail if tables are empty
        if (empty($careerIds) || empty($jobAppIds) || empty($candidateIds)) {
            $this->command->error('❌ Please seed careers, job_applications, and candidates first.');
            return;
        }

        foreach (range(1, 10) as $i) {
            DB::table('interviews')->insert([
                'career_id'          => $faker->randomElement($careerIds),
                // 'job_application_id' => $faker->randomElement($jobAppIds),
                'candidate_id'       => $faker->randomElement($candidateIds),
                'type'               => $faker->randomElement(['online','offline']),
                'interview_date'     => $faker->dateTimeBetween('+1 days', '+1 month')->format('Y-m-d'),
                'duration'           => $faker->randomFloat(1, 0.5, 3), // 0.5 to 3 hours
                'details'            => $faker->sentence(),
                'created_at'         => now(),
                'updated_at'         => now(),
            ]);
        }
    }
}
