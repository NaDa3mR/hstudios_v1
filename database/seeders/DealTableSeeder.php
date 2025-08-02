<?php

namespace Database\Seeders;

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
        $serviceRequests = Service_Request::take(3)->get(); // adjust count as needed

        foreach ($serviceRequests as $request) {
            Deal::create([
                'service_request_id' => $request->id,
                'status' => 'pending',
                'details' => 'This deal is automatically generated for testing.',
            ]);
        }
    }
}
