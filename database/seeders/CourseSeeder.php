<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $instruments = \App\Models\Instrument::all();

        \App\Models\Course::factory(10)->make()->each(function ($course) use ($instruments) {
            $course->instrument_id = $instruments->random()->id;
            $course->save();
        });
    }
}
