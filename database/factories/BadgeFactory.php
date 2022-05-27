<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Badge>
 */
class BadgeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        Storage::fake('avatars');
        return [
            'title' => $this->faker->name(),
            'description' => $this->faker->text(),
            'file' =>  UploadedFile::fake()->image('avatar.jpg'),
            'min_coins' => $this->faker->numberBetween(0, 28000),
            'max_coins' => $this->faker->numberBetween(0, 28000),
        ];
    }
}
