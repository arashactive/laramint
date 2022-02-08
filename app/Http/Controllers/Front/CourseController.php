<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Course;
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
        $courses = Course::with('Department')->get();

        return view('contents.front.courses.index', compact([
            "departments",
            "courses"
        ]));
    }
}
