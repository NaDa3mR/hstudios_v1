<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Web Development',
                'title' => 'Professional Web Development Services',
                'slug' => Str::slug('Web Development'),
                'meta_keyword' => 'web, development, services',
                'meta_description' => 'We offer expert web development services.',
                'meta_title' => 'Web Development Services',
                'details' => 'We build modern, responsive websites tailored to your business needs.',
            ],
            [
                'name' => 'SEO Optimization',
                'title' => 'Effective SEO Services',
                'slug' => Str::slug('SEO Optimization'),
                'meta_keyword' => 'SEO, optimization, marketing',
                'meta_description' => 'Boost your visibility with our SEO solutions.',
                'meta_title' => 'SEO Services',
                'details' => 'Our SEO services help your business rank higher on search engines.',
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
