<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Department;
use App\Models\Plan;

class CourseController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
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



    /**
     * Display a listing of the resource.
     * @param int $id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function course($id)
    {

        $course = Course::with('Terms')->findorfail($id);
        return view('contents.front.courses.course', compact([
            "course"
        ]));
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
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
