<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'description' => $this->faker->text(),
            'image' => $this->faker->image(public_path('/department'),640,480, null, false),
            'is_published' => true,
        ];
    }
}
