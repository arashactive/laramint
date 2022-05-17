<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Models\Department;


class CourseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('course.index');
        $courses = Course::paginate();
        return view("contents.admin.courses.index", compact("courses"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('course.create');
        $departments = $this->getDepartmentsPluck();
        return view('contents.admin.courses.form', compact(
            'departments'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CourseRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $this->authorize('course.create');
        Course::create($request->all());
        return redirect()
            ->route("course.index")
            ->with('success', __('item created successfully'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $this->authorize('course.edit');
        $departments = $this->getDepartmentsPluck();
        return view('contents.admin.courses.form', compact(
            "course",
            "departments"
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CourseRequest $request
     * @param  Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, Course $course)
    {
        $this->authorize('course.edit');
        $course->update($request->all());
        return redirect()
            ->route("course.index")
            ->with('warning', __('item updated successfully'));
    }

    /**
     * Remove the specified course from storage.
     *
     * @param  Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $this->authorize('course.delete');
        $course->delete();
        return redirect()
            ->route("course.index")
            ->with('danger', __('item deleted successfully'));
    }


    private function getDepartmentsPluck()
    {
        return Department::pluck('title', 'id');
    }
}
