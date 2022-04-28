<?php

namespace App\Http\Controllers\learn;

use App\Http\Controllers\Controller;
use App\Models\Sessionable;
use App\Models\Term;
use App\Models\Workout;
use App\utility\modules\tasks\TaskFactory;

class WorkoutController extends Controller
{
   
    public function task(Term $term, Sessionable $sessionable){
        $className = $sessionable->sessionable_type;
        $task = TaskFactory::Build($className);
        return $task->Render($term, $sessionable);
    }

    public function completedAndNext(Workout $workout)
    {
        if ($workout->is_completed == 0)
            $workout->Completed();

        return redirect()->back();
    }
}
