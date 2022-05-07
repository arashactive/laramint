<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use App\utility\modules\terms\TermModule;

class MyCourseController extends Controller
{

    public function myCourse()
    {
        
        $this->authorize('myCourse.index');

        $termModule = new TermModule();
        $terms = $termModule->getAllTerms();

        return view('contents.learn.mycourses.list', compact([
            'terms'
        ]));
    }


    public function learn(Participant $participant)
    {
        //$this->authorize('participantAccessToTerm', [$term]);
        $termModule = new TermModule();
        $term = $termModule->Participant($participant);
        
        return view('contents.learn.mycourses.show', compact([
            'term', 'participant'
        ]));
    }
}
