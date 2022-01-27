<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Course;

class FrontCourseController extends Controller
{
    public function showCourses()
    {
        $courses = Course::with('Department')->get();
        return view('front.courses.all', compact('courses'));
    }

    public function showCourse($course_id)
    {
        $course = Course::findorfail($course_id);
        return view('front.courses.course', compact('course'));
    }
}
