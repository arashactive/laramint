<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Models\File;
use App\Traits\UploadFiles;
use Illuminate\Support\Facades\Storage;


class FileController extends Controller
{
    use UploadFiles;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
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
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
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
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(FileRequest $request)
    {

        $this->authorize('file.create');
        File::create($this->setData($request));
        return redirect()
            ->route("file.index")
            ->with('success', __('file created successfully'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  mixed $request
     * @return array
     */
    private function setData($request)
    {
        
        if (Storage::exists('public/' . $request->file)) {
            $path = Storage::path('public/' . $request->file);
            return [
                'title' => $request->title,
                'description' => $request->description,
                'file' => $request->file,
                'file_size' => Storage::disk('public')->size($request->file),
                'file_type' => pathinfo($path, PATHINFO_EXTENSION)
            ];
        }

        return [];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  File  $file
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
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
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
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
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
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
