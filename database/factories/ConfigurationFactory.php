<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Configuration>
 */
class ConfigurationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'config_type' => $this->faker->name,
            'config_value' => json_encode($this->faker->numberBetween(10,100)),
            'config_category' => $this->faker->name 
        ];
    }
}
