<?php

namespace Database\Seeders;

use App\Models\Expense_Source;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpenseSourceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sources = [
            [
                'name' => 'Office Rent',
                'details' => 'Monthly rent for office space',
                'is_active' => 1,
            ],
            [
                'name' => 'Software Subscriptions',
                'details' => 'Recurring SaaS payments',
                'is_active' => 1,
            ],
            [
                'name' => 'Utilities',
                'details' => 'Electricity, internet, and water bills',
                'is_active' => 1,
            ],
            [
                'name' => 'Team Lunches',
                'details' => 'Occasional team bonding meals',
                'is_active' => 1,
            ],
            [
                'name' => 'Advertising',
                'details' => 'Social media and search engine ad spend',
                'is_active' => 1,
            ],
        ];

        foreach ($sources as $source) {
            Expense_Source::create($source);
        }
    }
}
