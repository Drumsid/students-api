<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LectureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "topic" => $this->faker->unique()->sentence(3),
            "description" => $this->faker->paragraph(2),
        ];
    }
}
