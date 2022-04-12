<?php

namespace App\Http\Controllers\learn;

use App\Http\Controllers\Controller;
use App\Models\Workout;

class WorkoutController extends Controller
{
    public function completedAndNext(Workout $workout)
    {
        if ($workout->is_completed == 0)
            $workout->Completed();

        return redirect(route('learningCourse', ['term' => $workout->term_id]));
    }
}
