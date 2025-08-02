<?php

namespace Database\Seeders;

use Hash;
use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = [
            [
                'name' => 'Nada Amr',
                'email' => 'nada@example.com',
                'password' => Hash::make('password123'),
                'company_name' => 'Tech Solutions',
                'company_field' => 'Software Development',
            ],
            [
                'name' => 'Omar Ali',
                'email' => 'omar@example.com',
                'password' => Hash::make('password456'),
                'company_name' => 'Creative Studio',
                'company_field' => 'Marketing',
            ],
        ];

        foreach ($clients as $client){
            Client::create($client);
        }
    }
}
