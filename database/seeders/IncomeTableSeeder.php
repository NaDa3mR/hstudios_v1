<?php

namespace Database\Seeders;

use App\Models\Income;
use App\Models\Account;
use App\Models\Income_Source;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncomeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accountIds = Account::pluck('id')->toArray();
        $sourceIds = Income_Source::pluck('id')->toArray();

        if (empty($accountIds) || empty($sourceIds)) {
            $this->command->warn('Please seed accounts and income_sources tables first.');
            return;
        }

        $data = [
            [
                'account_id' => $accountIds[0],
                'income_source_id' => $sourceIds[0],
                'title' => 'Client A Payment',
                'amount' => 2500.00,
                'income_date' => now()->subDays(7)->toDateString(),
                'details' => 'Monthly retainer from Client A',
            ],
            [
                'account_id' => $accountIds[0],
                'income_source_id' => $sourceIds[1] ?? $sourceIds[0],
                'title' => 'E-Book Sales',
                'amount' => 750.00,
                'income_date' => now()->subDays(3)->toDateString(),
                'details' => 'Automated sales income',
            ],
            [
                'account_id' => $accountIds[1] ?? $accountIds[0],
                'income_source_id' => $sourceIds[2] ?? $sourceIds[0],
                'title' => 'Consulting Session',
                'amount' => 1200.00,
                'income_date' => now()->toDateString(),
                'details' => '1-on-1 consulting service',
            ],
        ];

        foreach ($data as $item) {
            Income::create($item);
        }
    }
}
