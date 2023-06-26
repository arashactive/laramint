<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'testimonial_msg' =>  $this->faker->text(),
            'testimonial_by' => $this->faker->text(),
            'course' =>  $this->faker->text(),
            'image' => 'file.png',
            'rating' => $this->faker->text(),
        ];
    }
}
