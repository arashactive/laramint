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
            'image' => 'file.png' ,
            'is_published' => true,
            'department_id' => Department::factory(),
        ];
    }
}
