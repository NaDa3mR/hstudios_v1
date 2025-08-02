<?php

namespace Database\Seeders;

use App\Models\Income_Source;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncomeSourceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sources = [
            [
                'name' => 'Client Payments',
                'details' => 'Monthly payments from clients for service contracts.',
                'is_active' => 1,
            ],
            [
                'name' => 'Product Sales',
                'details' => 'Income from software product sales.',
                'is_active' => 1,
            ],
            [
                'name' => 'Consulting Services',
                'details' => 'Fees from consulting and freelance projects.',
                'is_active' => 1,
            ],
        ];

        foreach ($sources as $source) {
            Income_Source::create($source);
        }
    }
}
