<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // make about page, terms page, privacy policy page
        Page::create([
            'company_id' => 1,
            'title' => 'About',
            'slug' => 'about',
            'content' => 'About',
            'status' => 'published',
        ]);

        Page::create([
            'company_id' => 1,
            'title' => 'Terms',
            'slug' => 'terms',
            'content' => 'Terms',
            'status' => 'published',
        ]);

        Page::create([
            'company_id' => 1,
            'title' => 'Privacy Policy',
            'slug' => 'privacy-policy',
            'content' => 'Privacy Policy',
            'status' => 'published',
        ]);
    }
}
