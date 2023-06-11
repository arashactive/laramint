<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentDocs;

class StudentDocsCOntroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $this->authorize('student_doc.index');
        $student_docs = Badge::paginate();
        return view("contents.admin.student_docs.index", compact("student_docs"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        $this->authorize('student_docs.create');
        return view('contents.admin.student_docs.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BadgeRequest  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(BadgeRequest $request)
    {
        $this->authorize('student_docs.create');
        Badge::create($request->all());
        return redirect()
            ->route("student_docs.index")
            ->with('success', __('item created successfully'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  Badge  $student_doc
     *      * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Badge $student_doc)
    {
        $this->authorize('student_docs.edit');
        return view('contents.admin.student_docs.form', compact(
            "student_doc"
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  student_docsRequest  $request
     * @param  student_docs  $student_doc
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(BadgeRequest $request, Badge $student_doc)
    {
        $this->authorize('student_docs.edit');
        $student_doc->update($request->all());
        return redirect()
            ->route("student_docs.index")
            ->with('warning', __('item updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  student_docs  $student_doc
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Badge $student_doc)
    {
        $this->authorize('student_docs.delete');
        try {
            $student_doc->delete();
            return redirect()
                ->route("student_docs.index")
                ->with('danger', __('item deleted successfully'));
        } catch (\Exception $e) {
            return redirect()
                ->route("student_docs.index")
                ->with('danger', __('Delete is not Completed, Please check child of this student_docs'));
        }
    }
}
