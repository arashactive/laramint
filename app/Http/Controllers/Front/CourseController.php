<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Term;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function courses()
    {
        // get 3 departments that you made.
        $departments = Department::limit(3)->get();
        
        // get 3 departments that you made.
        $terms = Term::limit(5)->get();

        return view('contents.front.courses.index', compact([
            "departments",
            "terms"
        ]));
    }
}
