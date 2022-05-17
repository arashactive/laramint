<?php

namespace App\Http\Controllers;

use App\Models\Rubric;
use Illuminate\Http\Request;

class RubricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
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
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        $this->authorize('rubric.create');
        return view('contents.admin.rubric.form');
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rubric  $rubric
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Rubric $rubric)
    {
        $this->authorize('rubric.edit');
        return view('contents.admin.rubric.form', compact(
            "rubric"
        ));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rubric  $rubric
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Rubric $rubric)
    {
        $rubric->delete();

        return redirect()->route('rubric.index')->with('danger', 'Rubric deleted successfully');
    }
}
