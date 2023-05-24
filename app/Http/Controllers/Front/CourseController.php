<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Front\CourseServices;
use App\Services\Front\HomeServices;

class CourseController extends Controller
{
    protected $homeService;
    protected $courseService;

    public function __construct(HomeServices $homeService, CourseServices $courseService)
    {
        $this->homeService = $homeService;
        $this->courseService = $courseService;
    }

    /**
     * Display a listing of the Courses.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function courses()
    {
        $homeCompactReturn = $this->homeService->homeIndex();
        return view('contents.front.courses.index', $homeCompactReturn);
    }



    /**
     * Display a listing of the resource.
     * @param int $id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function course($id)
    {
        $courseCompactData = $this->courseService->getCourseInfo($id);

        return view('contents.front.courses.course', $courseCompactData);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function plans()
    {

        $plans = $this->courseService->getPlanPageInfo();
        return view(
            'contents.front.plans.index',
            $plans
        );
    }
}
