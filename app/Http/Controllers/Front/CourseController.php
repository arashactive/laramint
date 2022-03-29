<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Department;
use App\Models\Plan;

class CourseController extends Controller
{
    public function courses()
    {
        // get 3 departments that you made.
        $departments = Department::limit(10)->get();

        // get 3 departments that you made.
        $courses = Course::with('Department', 'Terms')->get();

        return view('contents.front.courses.index', compact([
            "departments",
            "courses"
        ]));
    }

    public function course($id)
    {

        $course = Course::with('Terms')->findorfail($id);
        return view('contents.front.courses.course', compact([
            "course"
        ]));
    }


    public function plans()
    {

        $plans = Plan::all();
        return view(
            'contents.front.plans.index',
            compact([
                "plans"
            ])
        );
    }
}
