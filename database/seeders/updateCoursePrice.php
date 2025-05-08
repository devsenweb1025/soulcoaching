<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class updateCoursePrice extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::update(['id' => 1], ['price' => 1]);
    }
}
