<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Course;

class FrontCourseController extends Controller
{
    public function showCourses()
    {
        $courses = Course::with('Department')->get();
        return view('front.courses.show', compact('courses'));
    }
}
