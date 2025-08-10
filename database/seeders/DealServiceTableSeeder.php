<?php

namespace Database\Seeders;

use App\Models\Deal;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DealServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $deals = Deal::all();
        $services = Service::all();

        foreach ($deals as $deal) {
            $max = min(3, $services->count());
            if ($max === 0) {
                continue; 
            }

            $randomServices = $services->random(rand(1, $max))->pluck('id');
            $deal->services()->syncWithoutDetaching($randomServices);
        }
    }
}
