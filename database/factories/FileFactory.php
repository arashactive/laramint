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

        $file = public_path('img/MintImage.png');


        return [
            'description' => $this->faker->sentence(),
            'file' => UploadedFile::fake()->create($file)
        ];
    }
}
