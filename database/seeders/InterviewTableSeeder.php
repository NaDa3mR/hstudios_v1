<?php

namespace Database\Seeders;

use App\Models\Job_Application;
use App\Models\Interview;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InterviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobApplications = Job_Application::take(3)->get();

        foreach ($jobApplications as $application) {
            Interview::create([
                'job_application_id' => $application->id,
                'type' => 'Online',
                'interview_date' => Carbon::now()->addDays(rand(1, 14))->toDateString(),
                'duration' => rand(30, 90),
                'details' => 'Initial interview with candidate via Zoom.',
            ]);
        }
    }
}
