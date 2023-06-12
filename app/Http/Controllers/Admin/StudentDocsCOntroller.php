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
        $whatsAppReminderMsg = 'Dear Student,%0aKindly update all your document & validate your mobile. Thanks!%0aICET, Agra';
        $this->authorize('student_doc.index');
        $student_docs = StudentDocs::paginate();
        return view("contents.admin.student_docs.index", compact("student_docs",'whatsAppReminderMsg'));
    }

    public function dashboard()
    {
        $this->authorize('student_doc.dashboard');
        // total
        $total_applications = StudentDocs::count();
        // mobile
        $verified_mobile_applications = StudentDocs::where('is_mobile_verified',1)->count();
        $not_verified_mobile_applications = StudentDocs::where('is_mobile_verified',0)->count();
        // email
        $verified_email_applications = StudentDocs::where('is_email_verified',1)->count();
        $not_verified_email_applications = StudentDocs::where('is_email_verified',0)->count();
        $data['label'] = ['Verified Mobiles','Mobile Not Verified', 'Verified Email','Email Not Verified'];
        $data['data'] = [$verified_mobile_applications,$not_verified_mobile_applications,$verified_email_applications,$not_verified_email_applications];
        $data['chart_data'] = json_encode($data);
        return view("contents.admin.student_docs.dashboard", compact("total_applications",'verified_mobile_applications',
                'not_verified_mobile_applications','verified_email_applications','not_verified_email_applications','data'));
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
