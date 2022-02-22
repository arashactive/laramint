<?php

namespace App\Http\Controllers\learn;

use App\Http\Controllers\Controller;
use App\Models\Rubric;

class rubricLearnerController extends Controller
{
    public function show(Rubric $rubric)
    {
        
        return view('contents.learn.rubric.show', compact([
            'rubric'
        ]));
    }
}
