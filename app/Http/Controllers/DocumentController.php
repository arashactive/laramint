<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Models\Document;

class DocumentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('document.index');
        $documents = Document::paginate(env('PAGINATION'));
        return view("contents.admin.document.index", compact("documents"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('document.create');
        return view('contents.admin.document.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentRequest $request)
    {
        $this->authorize('document.create');
        Document::create($request->all());
        return redirect()
            ->route("document.index")
            ->with('success' , __('item created successfully'));

    }


    /**
     * Show the form for showing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        $this->authorize('document.show');
        return view('contents.admin.document.show' , compact(
            "document"
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        $this->authorize('document.edit');
        return view('contents.admin.document.form' , compact(
            "document"
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentRequest $request, Document $document)
    {
        $this->authorize('document.edit');
        $document->update($request->all());
        return redirect()
                ->route("document.index")
                ->with('warning' , __('item updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $activity)
    {
        $this->authorize('document.delete');
        try{
            $activity->delete();
            return redirect()
                    ->route("document.index")
                    ->with('danger' , __('item deleted successfully'));
        }catch (\Exception $e){
            return redirect()
            ->route("document.index")
            ->with('danger' , __('Delete is not Completed, Please check child of this document'));
        }
        
    }


}
