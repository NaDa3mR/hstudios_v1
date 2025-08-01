<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $slug = Str::slug('Getting Started with Laravel');
        $originalSlug = $slug;
        $counter = 1;

        while (Blog::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }
        $blogs = [
            [
                'title' => 'Getting Started with Laravel',
                'sub_title' => 'A beginner guide to Laravel framework',
                'slug' => $slug,
                'meta_keyword' => 'Laravel, PHP, Web Development',
                'meta_description' => 'Learn how to get started with Laravel, one of the most popular PHP frameworks.',
                'meta_title' => 'Getting Started with Laravel',
                'details' => 'Laravel is a web application framework with expressive, elegant syntax...',
                'is_active' => 1,
            ],
            [
                'title' => 'Why SEO Matters',
                'sub_title' => 'Understanding the basics of SEO',
                'slug' => $slug,
                'meta_keyword' => 'SEO, Marketing, Meta Tags',
                'meta_description' => 'Explore why search engine optimization is essential for your website.',
                'meta_title' => 'Why SEO Matters',
                'details' => 'Search Engine Optimization (SEO) helps increase the visibility of your website...',
                'is_active' => 1,
            ],
            [
                'title' => 'Laravel Tips for Developers',
                'sub_title' => 'Boost your Laravel productivity',
                'slug' => $slug,
                'meta_keyword' => 'Laravel, Tips, Tricks',
                'meta_description' => 'Handy Laravel tips to write cleaner, faster code.',
                'meta_title' => 'Laravel Tips for Developers',
                'details' => 'Laravel provides many hidden features that can help you become more productive...',
                'is_active' => 0,
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::create($blog);
        }
    }

}


