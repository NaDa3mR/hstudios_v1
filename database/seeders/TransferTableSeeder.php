<?php

namespace Database\Seeders;

use App\Models\Transfer;
use App\Models\Account;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransferTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accountIds = Account::pluck('id')->toArray();

        // Ensure at least 2 accounts exist
        if (count($accountIds) < 2) {
            return;
        }

        foreach (range(1, 10) as $i) {
            do {
                $from = fake()->randomElement($accountIds);
                $to = fake()->randomElement($accountIds);
            } while ($from === $to); // avoid same account

            Transfer::create([
                'account_id_from' => $from,
                'account_id_to' => $to,
                'title' => fake()->sentence(3),
                'amount' => fake()->randomFloat(2, 50, 5000),
                'transfer_date' => now()->subDays(rand(0, 30)),
                'details' => fake()->optional()->paragraph(),
            ]);
        }
    }
}
