<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use App\Utility\Modules\Terms\TermModule;

class MyCourseController extends Controller
{

    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function myCourse()
    {

        $this->authorize('myCourse.index');

        $termModule = new TermModule();
        $terms = $termModule->getAllTerms();

        return view('contents.learn.mycourses.list', compact([
            'terms'
        ]));
    }


    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
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
