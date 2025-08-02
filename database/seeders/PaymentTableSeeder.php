<?php

namespace Database\Seeders;

use App\Models\Deal;
use App\Models\Client;
use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $deals = Deal::pluck('id')->all();
        $clients = Client::pluck('id')->all();

        if (empty($deals) || empty($clients)) {
            $this->command->warn('No deals or clients found. Seed them first.');
            return;
        }

        foreach (range(1, 10) as $i) {
            Payment::create([
                'deal_id' => fake()->randomElement($deals),
                'client_id' => fake()->randomElement($clients),
                'amount' => fake()->randomFloat(2, 500, 5000),
                'pay_date' => fake()->date(),
                'details' => fake()->sentence(),
            ]);
        }
    }
}
