<?php

namespace App\Http\Controllers\Education;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Services\Back\Educations\CourseAdminService;

class CourseController extends Controller
{

    protected $service;

    public function __construct(CourseAdminService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $this->authorize('course.index');
        $courses = $this->service->index();
        return $this->service->view('index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        $this->authorize('course.create');
        return $this->service->view('form', $this->service->create());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CourseRequest $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(CourseRequest $request)
    {
        $this->authorize('course.create');
        $this->service->store($request->all());
        return $this->service->redirect();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $course_id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit($course_id)
    {
        $this->authorize('course.edit');
        return $this->service->view('form', $this->service->edit($course_id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CourseRequest $request
     * @param  int  $course_id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(CourseRequest $request, $course_id)
    {
        $this->authorize('course.edit');
        $this->service->update($request->all(), $course_id);
        return $this->service->redirect('warning');
    }

    /**
     * Remove the specified course from storage.
     *
     * @param  int  $course_id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function destroy($course_id)
    {
        $this->authorize('course.delete');
        if ($this->service->destroy($course_id))
            return $this->service->redirect('warning');
    }
}
