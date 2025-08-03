<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\Word;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (range(1, 10) as $i) {
            Word::create([
                'param' => Str::slug(fake()->words(2, true), '_'),
                'ar' => fake('ar_SA')->sentence,
                'fr' => fake('fr_FR')->sentence,
                'en' => fake()->sentence,
                'wordable_type' => 'App\Models\ExampleModel', // Replace with actual model
                'wordable_id' => 1, // Replace with actual ID of that model
            ]);
        }
    }
}
