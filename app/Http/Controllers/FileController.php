<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Models\File;

class FileController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('file.index');
        $files = File::paginate(env('PAGINATION'));
        return view("contents.admin.toolbox.file.index", compact("files"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('file.create');
        return view('contents.admin.toolbox.file.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FileRequest $request)
    {

        $this->authorize('file.create');
        File::create($this->setData($request));
        return redirect()
            ->route("file.index")
            ->with('success', __('file created successfully'));
    }


    private function setData($request)
    {

        return [
            'description' => $request->description,
            'url' => '',
            'file_size' => $request->file('file')->getSize(),
            'file_type' => $request->file('file')->extension()
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        $this->authorize('file.edit');
        return view('contents.admin.toolbox.file.form', compact(
            "file"
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(FileRequest $request, File $file)
    {
        $this->authorize('file.edit');
        $file->update($this->setData($request));
        return redirect()
            ->route("file.index")
            ->with('warning', __('item updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $this->authorize('file.delete');
        $file->delete();
        return redirect()
            ->route("file.index")
            ->with('danger', __('item deleted successfully'));
    }
}
