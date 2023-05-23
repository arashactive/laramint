<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Plan;
use App\Services\Front\CourseServices;
use App\Services\Front\HomeServices;

class CourseController extends Controller
{


    /**
     * Display a listing of the Courses.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function courses(HomeServices $courseServices)
    {
        $homeCompactReturn = $courseServices->homeIndex();
        return view('contents.front.courses.index', $homeCompactReturn);
    }



    /**
     * Display a listing of the resource.
     * @param int $id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function course($id, CourseServices $courseServices)
    {
        $courseCompactData = $courseServices->getCourseInfo($id);

        return view('contents.front.courses.course', $courseCompactData);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function plans(CourseServices $courseServices)
    {

        $plans = $courseServices->getPlanPageInfo();
        return view(
            'contents.front.plans.index',
            $plans
        );
    }
}
