<?php

namespace App\Http\Controllers\learn;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\File;
use App\Models\Session;
use App\Models\Sessionable;
use App\Models\Term;
use App\utility\file\FileFactory;
use App\utility\workout\WorkoutService;

class documentLearnerController extends Controller
{

    public function show(Term $term, Document $activity, Session $session, Sessionable $sessionable)
    {
        $this->authorize('participantAccessToTerm', $term);
        WorkoutService::WorkOutSyncForThisExcersice($term, $session, $activity->id, $sessionable->id);

        return view('contents.learn.document.show', compact([
            'activity', 'term'
        ]));
    }

    public function file(Term $term, File $activity, Session $session, Sessionable $sessionable)
    {
        $this->authorize('participantAccessToTerm', $term);

        // set a record for workout table
        WorkoutService::WorkOutSyncForThisExcersice($term, $session, $activity->id, $sessionable->id);

        $file = FileFactory::Build($activity)->makeRenderFile();

        return view('contents.learn.document.file', compact([
            'activity', 'term', 'file'
        ]));
    }
}
