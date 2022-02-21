<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => 'Doc ' . $this->faker->numberBetween(10,100),
            'description' => $this->faker->paragraph()
        ];
    }
}
