<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'teacher_id' => \App\Models\User::inRandomOrder()->first()->id ?? null,
            'price' => $this->faker->randomFloat(2, 50, 500),
            'schedule' => $this->faker->dayOfWeek() . ' ' . $this->faker->time('H:i'),
        ];
    }
}
