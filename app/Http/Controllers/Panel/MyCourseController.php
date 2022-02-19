<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Term;

class MyCourseController extends Controller
{

    public function myCourse()
    {
        $this->authorize('myCourse.index');

        $studentRoleId = 4;
        $terms = Term::with('Participants')
            ->MyCourse($studentRoleId)
            ->paginate();

        return view('contents.panel.my.course', compact([
            'terms'
        ]));
    }


    public function learn(Term $term)
    {
        return view('contents.panel.learn.show', compact([
            'term'
        ]));
    }
}
