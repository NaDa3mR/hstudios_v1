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
        foreach (range(1, 15) as $i) {
            $account = Account::inRandomOrder()->first();
            $sourceId = fake()->randomElement($sourceIds);

            $maxAmount = $account->balance;
            $amount = fake()->randomFloat(2, 10, $maxAmount ?: 10); // avoid 0

            // Skip if account balance is zero
            if ($amount > $maxAmount) {
                continue;
            }

            Expense::create([
                'account_id' => $account->id,
                'expense_source_id' => $sourceId,
                'title' => fake()->words(3, true),
                'amount' => $amount,
                'expense_date' => now()->subDays(rand(1, 30)),
                'details' => fake()->optional()->sentence(),
            ]);
        }

    }
}
