<?php

namespace App\Http\Controllers;

use App\Models\Rubric;
use Illuminate\Http\Request;

class RubricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('rubric.index');       
        $rubrics = Rubric::paginate();
        return view("contents.admin.rubric.index", compact("rubrics" ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('rubric.create');
        return view('contents.admin.rubric.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rubric  $rubric
     * @return \Illuminate\Http\Response
     */
    public function show(Rubric $rubric)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rubric  $rubric
     * @return \Illuminate\Http\Response
     */
    public function edit(Rubric $rubric)
    {
        $this->authorize('rubric.edit');
        return view('contents.admin.rubric.form', compact(
            "rubric"
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rubric  $rubric
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rubric $rubric)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rubric  $rubric
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rubric $rubric)
    {
        $rubric->delete();

        return redirect()->route('rubric.index')->with('danger', 'Rubric deleted successfully');
    }
}
