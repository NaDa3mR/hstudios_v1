<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Invoice;
use App\Models\Client;
use App\Models\Deal;
use Illuminate\Support\Str;

class InvoiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = Client::all();

        if ($clients->count() == 0) {
            $this->command->warn('⚠️ No clients found. Please seed clients first.');
            return;
        }

        foreach ($clients as $client) {
            $deal = Deal::where('client_id', $client->id)->inRandomOrder()->first();

            Invoice::create([
                'client_id' => $client->id,
                'deal_id' => $deal?->id,
                'invoice_number' => 'INV-' . strtoupper(Str::random(6)),
                'amount' => fake()->randomFloat(2, 1000, 5000),
                'invoice_date' => fake()->date(),
                'status' => fake()->randomElement(['unpaid', 'pending', 'paid']),
                'details' => fake()->sentence(8),
            ]);
        }
    }
}
