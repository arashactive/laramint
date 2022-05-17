<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Models\File;
use App\Traits\UploadFiles;

class FileController extends Controller
{
    use UploadFiles;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('file.index');
        $files = File::paginate();
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
     * @param  FileRequest $request
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
        $file = $request->file('file');
        return [
            'title' => $request->title,
            'description' => $request->description,
            'file' => $this->upload($file, $file->extension()),
            'file_size' => $file->getSize(),
            'file_type' => $file->extension()
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  File  $file
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
     * @param  FileRequest $request
     * @param  File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(FileRequest $request, File $file)
    {
        $this->authorize('file.edit');
        $this->delete($file->file); // remove old file from storage
        $file->update($this->setData($request));
        return redirect()
            ->route("file.index")
            ->with('warning', __('item updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $this->authorize('file.delete');
        $this->delete($file->file); // remove file from storage
        $file->delete();
        return redirect()
            ->route("file.index")
            ->with('danger', __('item deleted successfully'));
    }
}
