<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Experience::create(
            [
                'user_id'=>1,
                'title' => 'Laravel Intern',
                'description' => 'I have learned that laravel makes coding simple easier',
                'organization' => 'Techie-IT',
                'location' => 'New Baneshwor',
                'start_date' => '2025-07-01',
                'end_date' => null,
            ]
        );
    }
}
