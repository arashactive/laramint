<?php

namespace App\Http\Controllers\learn;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\File;
use App\Models\Term;

class documentLearnerController extends Controller
{

    public function show(Term $term, Document $activity)
    {
        $this->authorize('participantAccessToTerm', $term);

        return view('contents.learn.document.show', compact([
            'activity', 'term'
        ]));
    }

    public function file(Term $term, File $activity)
    {
        $this->authorize('participantAccessToTerm', $term);
    }
}
