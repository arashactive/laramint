<?php

namespace App\Http\Controllers\Mentors;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use Illuminate\Support\Facades\Auth;

class MyLearnerController extends Controller
{

    public function myLearners()
    {
        
        $participants = Participant::select('user_id')->Learners()->groupby('user_id')->paginate();
        
        return view('contents.mentors.myLearners.myLearnersIndex', compact(
            'participants'
        ));
    }
}
