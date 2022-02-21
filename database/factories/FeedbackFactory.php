<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FeedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => 'feedback ' . $this->faker->name(),
            'description' => $this->faker->text(),
            'require' => $this->faker->boolean(),
        ];
    }
}
