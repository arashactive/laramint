<?php

namespace Database\Factories;

use App\Models\Session;
use App\Models\Term;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Workout>
 */
class WorkoutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::find(8)->id,
            'term_id' => Term::find(1)->id,
            'session_id' => Session::find(1)->id,
            'sessionable_id' => 1,
            'activity_id' => 1,
            'date_first_view' => now(),
            'is_completed' => rand(0, 1)
        ];
    }
}
