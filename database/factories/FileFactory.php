<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

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
            'title' => $this->faker->unique()->name,
            'description' => $this->faker->sentence(),
            'file' =>  'avatar.txt',
            'file_size' => $this->faker->numberBetween(1200, 2800),
            'file_type' => 'img'
        ];
    }
}
