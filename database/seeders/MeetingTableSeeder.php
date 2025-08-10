<?php

namespace Database\Seeders;

use App\Models\Deal;
use App\Models\Meeting;
use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MeetingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientIds = Client::pluck('id')->toArray();
        $dealIds = Deal::pluck('id')->toArray();

        if (empty($clientIds)) {
            return; // No clients to associate with
        }
        if (empty($dealIds)) {
            return; // No deals to associate with
        }

        foreach (range(1, 10) as $i) {
            Meeting::create([
                'client_id' => fake()->randomElement($clientIds),
                'deal_id' => fake()->randomElement($dealIds),
                'subject' => fake()->sentence(3),
                'type' => fake()->randomElement(['Online', 'In-person', 'Phone Call']),
                'address' => fake()->address,
                'meet_date' => now()->addDays(rand(1, 30)),
                'details' => fake()->optional()->paragraph(),
            ]);
        }
    }
}
