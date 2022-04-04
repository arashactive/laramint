<?php

namespace App\Http\Controllers\learn;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Session;
use App\Models\Sessionable;
use App\Models\Term;
use App\utility\workout\WorkoutService;

class feedbackLearnerController extends Controller
{
    public function show(Term $term, Feedback $activity, Session $session, Sessionable $sessionable)
    {

        $this->authorize('feedbackViewForLearner', [$activity, $term]);

        WorkoutService::WorkOutSyncForThisExcersice($term, $session, $activity->id, $sessionable->id);

        return view('contents.learn.feedback.show', compact([
            'term', 'activity'
        ]));
    }
}
