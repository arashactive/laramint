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
        // $this->faker->image(public_path('/department'),640,480, null, false)
        return [
            'title' => 'Department ' . $this->faker->name(),
            'description' => $this->faker->text(),
            'image' => 'file.png' ,
            'is_published' => true,
        ];
    }
}
