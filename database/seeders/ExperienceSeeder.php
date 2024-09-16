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
        $experiences = [
            [
                'title' => 'Beginner',
                'rate' => 15.00,
                'duration' => "hr" // Assuming duration is in hours (adjust as needed)
            ],
            [
                'title' => 'Mid-level',
                'rate' => 25.00,
                'duration' => "hr"
            ],
            [
                'title' => 'Expert',
                'rate' => 40.00,
                'duration' => "hr"
            ]
        ];

        foreach ($experiences as $experience) {
            Experience::updateOrCreate($experience, $experience);
        }
    }
}
