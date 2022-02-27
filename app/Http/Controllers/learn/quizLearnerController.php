<?php

namespace App\Http\Controllers\learn;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Term;


class quizLearnerController extends Controller
{

    public function show(Term $term, Quiz $activity){
        
        $this->authorize('QuizViewForLearner', [$activity, $term]);

        return view('contents.learn.quiz.show', compact([
            'term', 'activity'
        ]));
    }
}
