<?php

namespace App\Http\Controllers\Mentors;

use App\Http\Controllers\Controller;
use App\Models\Participant;

class MyLearnerController extends Controller
{
    
    public function myLearners(){
        $participants = Participant::Learners()->paginate();        
        
        return view('contents.mentors.myLearners.myLearnersIndex', compact(
            'participants'
        ));
    }

}
