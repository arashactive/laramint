<?php

namespace App\Http\Controllers\learn;

use App\Http\Controllers\Controller;
use App\Models\Rubric;
use App\Models\Term;

class rubricLearnerController extends Controller
{
    public function show(Term $term, Rubric $activity)
    {        
        $this->authorize('participantAccessToTerm', $term);

        return view('contents.learn.rubric.show', compact([
            'activity'
        ]));
    }
}
