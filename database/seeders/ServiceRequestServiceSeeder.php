<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Service_Request;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceRequestServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $serviceRequests = Service_Request::all();
        $services = Service::pluck('id')->toArray();

        foreach ($serviceRequests as $request) {
            $randomServices = collect($services)->random(2);
            $request->services()->syncWithoutDetaching($randomServices);
        }
    }
}
