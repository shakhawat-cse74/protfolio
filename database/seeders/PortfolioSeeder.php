<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\PersonalInfo::create([
            'name' => 'John Doe',
            'role' => 'Full Stack Developer',
            'bio' => 'A passionate developer with 5 years of experience in building modern web applications.',
            'email' => 'john@example.com',
            'phone' => '+123456789',
            'address' => 'Dhaka, Bangladesh',
            'github' => 'https://github.com',
            'linkedin' => 'https://linkedin.com',
        ]);

        \App\Models\Skill::create(['name' => 'Laravel', 'category' => 'Backend', 'percentage' => 90]);
        \App\Models\Skill::create(['name' => 'Vue.js', 'category' => 'Frontend', 'percentage' => 85]);
        \App\Models\Skill::create(['name' => 'Tailwind CSS', 'category' => 'Design', 'percentage' => 95]);

        \App\Models\Project::create([
            'title' => 'E-commerce Platform',
            'description' => 'A full-featured e-commerce site built with Laravel and Vue.',
            'tech_stack' => 'Laravel, Vue, MySQL',
            'demo_url' => 'https://example.com',
        ]);

        \App\Models\Service::create([
            'title' => 'Web Development',
            'icon' => 'code',
            'description' => 'Building responsive and high-performance websites.',
        ]);

        \App\Models\Experience::create([
            'company' => 'Tech Corp',
            'role' => 'Senior Developer',
            'duration' => '2022 - Present',
            'description' => 'Working on large scale enterprise applications.',
            'is_current' => true,
        ]);
        
        \App\Models\Setting::create(['key' => 'site_name', 'value' => 'My Portfolio']);
        \App\Models\Setting::create(['key' => 'theme_mode', 'value' => 'dark']);
    }
}
