<?php

namespace Database\Factories;

use App\Models\QuestionType;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->name(),
            'question_body' => $this->faker->paragraph(),
            'question_type_id' => QuestionType::all()->random()->id,
            'answer' => json_encode([])

        ];
    }
}
