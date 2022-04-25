<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Term;
use App\utility\modules\facades\TermFacade;
use App\utility\modules\terms\TermModule;
use Illuminate\Support\Facades\Auth;

class MyCourseController extends Controller
{

    public function myCourse()
    {
        $this->authorize('myCourse.index');

        $termModule = new TermModule();
        $terms = $termModule->All();
        
        return view('contents.learn.mycourses.list', compact([
            'terms'
        ]));
    }


    public function learn(Term $term)
    {
        $this->authorize('participantAccessToTerm', [$term]);
    
        return view('contents.learn.mycourses.show', compact([
            'term'
        ]));
    }
}
