<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CourseSeeder extends Seeder
{
    public function run()
    {
        $courses = [
            [
                'title' => 'Meditation Basics',
                'description' => 'Learn the fundamentals of meditation and mindfulness practices.',
                'price' => 199.00,
                'compare_price' => 249.00,
                'image' => 'meditation-basics.jpg',
                'is_featured' => true,
                'is_active' => true,
                'start_date' => Carbon::now()->addDays(30),
                'end_date' => Carbon::now()->addDays(37),
                'max_participants' => 20,
                'location' => 'Online',
                'duration' => '7 days',
                'requirements' => ['No prior experience needed', 'Comfortable clothing'],
                'materials' => ['Meditation cushion', 'Course handbook']
            ],
            [
                'title' => 'Advanced Energy Healing',
                'description' => 'Deep dive into energy healing techniques and practices.',
                'price' => 299.00,
                'compare_price' => 349.00,
                'image' => 'energy-healing.jpg',
                'is_featured' => true,
                'is_active' => true,
                'start_date' => Carbon::now()->addDays(45),
                'end_date' => Carbon::now()->addDays(52),
                'max_participants' => 15,
                'location' => 'Zurich Center',
                'duration' => '7 days',
                'requirements' => ['Basic energy healing knowledge', 'Open mind'],
                'materials' => ['Healing crystals', 'Course materials']
            ],
            [
                'title' => 'Chakra Balancing Workshop',
                'description' => 'Learn to balance and align your chakras for optimal well-being.',
                'price' => 149.00,
                'image' => 'chakra-balancing.jpg',
                'is_featured' => false,
                'is_active' => true,
                'start_date' => Carbon::now()->addDays(60),
                'end_date' => Carbon::now()->addDays(61),
                'max_participants' => 10,
                'location' => 'Bern Center',
                'duration' => '2 days',
                'requirements' => ['No prior experience needed'],
                'materials' => ['Chakra chart', 'Workshop materials']
            ]
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}