<?php

namespace App\Http\Controllers\learn;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Session;
use App\Models\Sessionable;
use App\Models\Term;
use App\utility\workout\WorkoutService;

class quizLearnerController extends Controller
{

    public function show(Term $term, Quiz $activity, Session $session, Sessionable $sessionable){
        
        $this->authorize('QuizViewForLearner', [$activity, $term]);

        // set a record for workout table
        WorkoutService::WorkOutSyncForThisExcersice($term, $session, $activity->id, $sessionable->id);

        return view('contents.learn.quiz.show', compact([
            'term', 'activity'
        ]));
    }
}
