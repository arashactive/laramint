<?php

namespace App\Http\Controllers\learn;

use App\Http\Controllers\Controller;
use App\Models\Rubric;
use App\Models\Session;
use App\Models\Sessionable;
use App\Models\Term;
use App\utility\workout\WorkoutService;

class rubricLearnerController extends Controller
{
    public function show(Term $term, Rubric $activity, Session $session, Sessionable $sessionable)
    {
        $this->authorize('participantAccessToTerm', $term);

        WorkoutService::WorkOutSyncForThisExcersice($term, $session, $activity->id, $sessionable->id);

        return view('contents.learn.rubric.show', compact([
            'activity'
        ]));
    }
}
