<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

     public function run(): void
    {
        $this->call([
            BlogSeeder::class,
            
            AccountTableSeeder::class,
            IncomeSourceTableSeeder::class,
            IncomeTableSeeder::class,
            ExpenseSourceTableSeeder::class,
            ExpenseTableSeeder::class,
            TransferTableSeeder::class,
            MeetingTableSeeder::class,
            CareerTableSeeder::class,
            CandidateTableSeeder::class,
            JobApplicationTableSeeder::class,
            InterviewTableSeeder::class,
            ClientTableSeeder::class,
            ServicesTableSeeder::class,
            ServiceRequestTableSeeder::class,
            DealTableSeeder::class,
            PaymentTableSeeder::class,
            WordTableSeeder::class,
            ContactTableSeeder::class,
            EmployeeTableSeeder::class,
            DealServiceTableSeeder::class,
            ServiceRequestServiceSeeder::class,
            ProjectSeeder::class,
            ProjectServiceSeeder::class,

        ]);

        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
