<?php

namespace App\Http\Controllers;

use App\Http\Requests\TermRequest;
use App\Models\Course;
use App\Models\Department;
use App\Models\Term;


class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terms = Term::paginate(env('PAGINATION'));
        
        return view("contents.admin.term.index", compact("terms"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = $this->getDepartmentsPluck(Department::class);
        $courses = $this->getDepartmentsPluck(Course::class);
        return view('contents.admin.term.form', compact(
            'departments' , 'courses'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CourseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TermRequest $request)
    {
        Term::create($request->all());
        return redirect()
            ->route("term.index")
            ->with('success' , __('item created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Term $term)
    {
        $departments = $this->getDepartmentsPluck(Department::class);
        $courses = $this->getDepartmentsPluck(Course::class);
        return view('contents.admin.term.form' , compact(
            "term" , "departments" , 'courses'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TermRequest $request, Term $term)
    {
        $term->update($request->all());
        return redirect()
                ->route("term.index")
                ->with('warning' , __('item updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Term $term)
    {
        $term->delete();
        return redirect()
                ->route("term.index")
                ->with('danger' , __('item deleted successfully'));
    }


    private function getDepartmentsPluck($model){
        return $model::pluck('title' , 'id');
    }
}
