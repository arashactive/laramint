<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use App\Utility\Modules\Terms\ParticipantInfoGenerator;
use App\Utility\Modules\Terms\TermModule;
use Illuminate\Support\Facades\Auth;

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

        $terms = ParticipantInfoGenerator::getAllTermsForParticipant(Auth::user());

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

        $participant = ParticipantInfoGenerator::getTermStatistic($participant);
        
        return view('contents.learn.mycourses.show', compact([
            'participant'
        ]));
    }
}
