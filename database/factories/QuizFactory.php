<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => 'quiz ' .$this->faker->name(),
            'description' => $this->faker->text(),
            'attempt' => $this->faker->numberBetween(0,10),
            'duration' => $this->faker->numberBetween(30,120),
            'is_mentor' => $this->faker->boolean(),
            'is_shuffle' => $this->faker->boolean(),
            'min_pass_score' => $this->faker->numberBetween(70,80),
            'show_question' => $this->faker->randomElement(['StepByStep' , 'OnePage']),
            'random_question' => 0,
        ];
    }
}
