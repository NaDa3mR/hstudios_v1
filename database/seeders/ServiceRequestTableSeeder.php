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
    {$client = Client::first();

        if (!$client) {
            $this->command->warn('No clients found. Please seed the clients table first.');
            return;
        }

        Service_Request::create([
            'name' => 'Website Redesign',
            'client_id' => $client->id,
            'details' => 'Client needs a full website redesign including UI/UX.',
        ]);

        Service_Request::create([
            'name' => 'Mobile App Development',
            'client_id' => $client->id,
            'details' => 'Client requested an Android/iOS app for e-commerce.',
        ]);
    }
}
