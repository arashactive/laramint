<?php

namespace App\Http\Controllers\Mentors;

use App\Http\Controllers\Controller;
use App\Models\Participant;

class MyLearnerController extends Controller
{


    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function myLearners()
    {

        $participants = Participant::select('user_id')->Learners()->groupby('user_id')->paginate();

        return view('contents.mentors.myLearners.myLearnersIndex', compact(
            'participants'
        ));
    }
}
