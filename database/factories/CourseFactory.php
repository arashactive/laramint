<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => 'Course ' . $this->faker->unique()->name(),
            'description' => $this->faker->text(),
            'image' => $this->faker->image(public_path('/course'),640,480, null, false),
            'is_published' => true,
            'department_id' => Department::factory(),
        ];
    }
}
