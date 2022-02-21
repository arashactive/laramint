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
        $bodies = [];
        for($counter = 1; $counter <= 5; $counter++){
            $bodies[] = [
                'item_title' => "part $counter",
                'cells' => [
                    ['score' => 0, 'title' => $this->faker->unique()->name()],
                    ['score' => 1, 'title' => $this->faker->unique()->name()],
                    ['score' => 2, 'pass' => true, 'title' => $this->faker->unique()->name()],
                    ['score' => 3, 'title' => $this->faker->unique()->name()],
                    ['score' => 4, 'title' => $this->faker->unique()->name()],
                ]
            ];
        }
        

        return [
            'title' => 'Rubric' . $this->faker->numberBetween(10, 100),
            'description' => $this->faker->sentence(),
            'body' => json_encode($bodies)
        ];
    }
}
