<?php

namespace Database\Seeders;

use App\Models\Job_Application;
use App\Models\Candidate;
use App\Models\Career;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class JobApplicationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {  DB::table('job_applications')->insert([
        [
            'career_id'  => 1, // must exist in careers table
            'first_name' => 'John',
            'last_name'  => 'Doe',
            'email'      => 'john.doe@example.com',
            'phone'      => '+1-555-123-4567',
            'country'    => 'USA',
            'city'       => 'New York',
            'linkedin'   => 'https://linkedin.com/in/johndoe',
            'github'     => 'https://github.com/johndoe',
            'behance'    => null,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'career_id'  => 1,
            'first_name' => 'Jane',
            'last_name'  => 'Smith',
            'email'      => 'jane.smith@example.com',
            'phone'      => '+1-555-987-6543',
            'country'    => 'USA',
            'city'       => 'Los Angeles',
            'linkedin'   => 'https://linkedin.com/in/janesmith',
            'github'     => 'https://github.com/janesmith',
            'behance'    => 'https://www.behance.net/janesmith',
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);
    }
}
