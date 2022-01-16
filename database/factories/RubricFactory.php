<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RubricFactory extends Factory
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
            'description' => $this->faker->sentence(),
            'body' => json_encode([
                'title' => $this->faker->unique()->name(),
                'items' => [
                    ['score' => 0 , $this->faker->unique()->name()], 
                    ['score' => 1 , $this->faker->unique()->name()], 
                    ['score' => 2 , 'pass' => true , $this->faker->unique()->name()], 
                    ['score' => 3 , $this->faker->unique()->name()], 
                    ['score' => 4 , $this->faker->unique()->name()], 
                ]
            ])
        ];
    }
}
