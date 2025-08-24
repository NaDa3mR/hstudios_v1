<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'name' => 'E-commerce Website',
            'content' => 'A modern e-commerce platform with cart and checkout.',
            'view_name' => 'projects.ecommerce', // resources/views/projects/ecommerce.blade.php
            'meta_keyword' => 'ecommerce, shop, online store',
            'meta_description' => 'Build your own e-commerce store with full functionality.',
            'meta_title' => 'E-commerce Website',
        ]);

        Project::create([
            'name' => 'CMS Builder',
            'content' => 'A content management system for managing websites easily.',
            'view_name' => 'projects.cms',
            'meta_keyword' => 'cms, content management, website builder',
            'meta_description' => 'Easily manage content with a custom CMS.',
            'meta_title' => 'CMS Builder',
        ]);

        Project::create([
            'name' => 'Portfolio Website',
            'content' => 'A personal portfolio to showcase projects and skills.',
            'view_name' => 'projects.portfolio',
            'meta_keyword' => 'portfolio, resume, showcase',
            'meta_description' => 'A sleek portfolio website for professionals.',
            'meta_title' => 'Portfolio Website',
        ]);
    }
}
