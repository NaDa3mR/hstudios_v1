<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accounts = [
            [
                'name' => 'Main Business Account',
                'balance' => 100000.00,
                'is_active' => 1,
            ],
            [
                'name' => 'Savings Account',
                'balance' => 50000.00,
                'is_active' => 1,
            ],
            [
                'name' => 'Inactive Old Account',
                'balance' => 0.00,
                'is_active' => 0,
            ],
        ];

        foreach ($accounts as $account) {
            Account::create($account);
        }
    }
}
