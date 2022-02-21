<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

class FileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'description' => $this->faker->sentence(),
            'file' =>  $this->faker->image(public_path('/files'),640,480, null, false),
            'file_size' => $this->faker->numberBetween(1200, 2800),
            'file_type' => 'img'
        ];
    }
}
