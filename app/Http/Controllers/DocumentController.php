<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Models\Document;
use App\Models\DocumentFile;
use App\Models\File;
use App\traits\Sequence;

class DocumentController extends Controller
{

    use Sequence;

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
            ->with('success', __('item created successfully'));
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
        return view('contents.admin.document.show', compact(
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
        return view('contents.admin.document.form', compact(
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
            ->with('warning', __('item updated successfully'));
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
        try {
            $activity->delete();
            return redirect()
                ->route("document.index")
                ->with('danger', __('item deleted successfully'));
        } catch (\Exception $e) {
            return redirect()
                ->route("document.index")
                ->with('danger', __('Delete is not Completed, Please check child of this document'));
        }
    }


    /**
     * change the sequences of file belongs to document
     *
     * @param  int  $file_id
     * @param  string  $move
     * @return \Illuminate\Http\Response
     */
    public function orderChangeFiles(DocumentFile $from, $move)
    {
        $this->authorize('document.order');

        $move_parameters = [
            'up' => '<',
            'down' => '>'
        ];
        
        $to = DocumentFile::where('document_id', $from->document_id)
            ->where('order', (string)$move_parameters[$move], $from->order)
            ->first();

        $this->changeOrder($from, $to);

        return redirect()->back();
    }


    /**
     * change the sequences of file belongs to document
     *
     * @param  int  $file_id
     * @param  string  $move
     * @return \Illuminate\Http\Response
     */
    public function addFileToDocument(Document $document, File $file)
    {
        
        $document->Files()->attach($file , 
            ['order' => $document->Files()->max('order') + 1]);
        return redirect()->back();
    }
    
    
    /**
     * change the sequences of file belongs to document
     *
     * @param  int  $file_id
     * @param  string  $move
     * @return \Illuminate\Http\Response
     */
    public function deleteFileAsDocument(Document $document, File $file)
    {
        
        $document->Files()->detach($file);
        return redirect()->back();
    }
}
