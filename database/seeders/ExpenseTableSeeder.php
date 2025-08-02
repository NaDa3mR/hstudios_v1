<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Expense;
use App\Models\Expense_Source;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpenseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accountIds = Account::pluck('id')->toArray();
        $sourceIds = Expense_Source::pluck('id')->toArray();

        // Skip if dependencies are missing
        if (empty($accountIds) || empty($sourceIds)) {
            return;
        }

        foreach (range(1, 15) as $i) {
            Expense::create([
                'account_id' => fake()->randomElement($accountIds),
                'expense_source_id' => fake()->randomElement($sourceIds),
                'title' => fake()->words(3, true),
                'amount' => fake()->randomFloat(2, 100, 10000),
                'expense_date' => now()->subDays(rand(1, 30)),
                'details' => fake()->optional()->sentence(),
            ]);
        }
    }
}
