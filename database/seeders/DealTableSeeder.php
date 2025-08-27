<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Deal;
use App\Models\Service_Request;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DealTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $serviceRequests = Service_Request::with('services')->take(3)->get();

        foreach ($serviceRequests as $request) {
            $deal = Deal::create([
                'client_id' => $request->client_id,
                'service_request_id' => $request->id,
                'name' => 'Website Redesign',
                'price' => '10000.0',
                'status' => 'pending',
                'details' => 'This deal is automatically generated for testing.',
            ]);

            // ربط الخدمات اللي كانت مربوطة بالـ service_request مع الـ deal
            $deal->services()->sync($request->services->pluck('id')->toArray());
        }
    }
}
