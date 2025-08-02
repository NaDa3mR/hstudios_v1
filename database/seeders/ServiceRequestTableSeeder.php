<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Service;
use App\Models\Service_Request;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceRequestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = Client::pluck('id')->all();
        $services = Service::pluck('id')->all();

        if (empty($clients) || empty($services)) {
            $this->command->warn('No clients or services found. Seed them first.');
            return;
        }

        foreach (range(1, 10) as $i) {
            Service_Request::create([
                'name' => fake()->company,
                'client_id' => fake()->randomElement($clients),
                'service_id' => fake()->randomElement($services),
                'status' => fake()->randomElement(['pending', 'in_progress', 'completed', 'cancelled']),
                'details' => fake()->paragraph,
            ]);
        }
    }
}
