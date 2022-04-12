<?php

namespace App\Http\Controllers\Mentors;

use App\Http\Controllers\Controller;

class MyLearnerController extends Controller
{
    
    public function myLearners(){
                
        return view('contents.mentors.myLearners.myLearnersIndex');
    }

}
