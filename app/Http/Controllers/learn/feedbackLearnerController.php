<?php

namespace App\Http\Controllers\learn;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Term;

class feedbackLearnerController extends Controller
{
    public function show(Term $term, Feedback $activity){
        
        $this->authorize('feedbackViewForLearner', [$activity, $term]);

        return view('contents.learn.feedback.show', compact([
            'term', 'activity'
        ]));
    }
}
