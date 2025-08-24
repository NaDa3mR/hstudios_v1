<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('project_service')->insert([
            [
                'project_id' => 1, // E-commerce Website
                'service_id' => 1, // Example: Web Development
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => 1,
                'service_id' => 2, // Example: Payment Integration
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => 2, // CMS Builder
                'service_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => 3, // Portfolio Website
                'service_id' => 2, // Example: UI/UX Design
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
