<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
class PlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->name,
            'description' =>  $this->faker->sentence(),
            'validDaysForUse' => $this->faker->numberBetween(30, 360),
            'price' => $this->faker->numberBetween(30, 360),
            'discount' => $this->faker->numberBetween(0, 5)
        ];
    }
}
