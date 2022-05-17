<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Models\Document;
use App\Models\DocumentFile;
use App\Models\File;
use App\Traits\Sequence;

class DocumentController extends Controller
{

    use Sequence;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $this->authorize('document.index');
        $documents = Document::paginate();
        return view("contents.admin.document.index", compact("documents"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        $this->authorize('document.create');
        return view('contents.admin.document.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DocumentRequest $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
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
     * @param  Document  $document
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
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
     * @param  Document  $document
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
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
     * @param  DocumentRequest $request
     * @param  Document $document
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
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
     * @param  Document  $activity
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
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
     * @param  DocumentFile $from
     * @param  string  $move
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function orderChangeFiles(DocumentFile $from, $move)
    {
        $this->authorize('document.order');

        $move_parameters = [
            'up' => ['char' => '<', 'order' => 'desc'],
            'down' => ['char' => '>', 'order' => 'asc']
        ];

        $to = DocumentFile::where('document_id', $from->document_id)
            ->where('order', (string)$move_parameters[$move]['char'], $from->order)
            ->orderby('order', (string)$move_parameters[$move]['order'])
            ->first();

        $this->changeOrder($from, $to);

        return redirect()->back();
    }


    /**
     * change the sequences of file belongs to document
     *
     * @param  Document  $document
     * @param  File $file
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function addFileToDocument(Document $document, File $file)
    {

        $document->Files()->attach(
            $file,
            ['order' => $document->Files()->max('order') + 1]
        );
        return redirect()->back();
    }


    /**
     * change the sequences of file belongs to document
     *
     * @param  DocumentFile  $documentFile
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function deleteFileAsDocument(DocumentFile $documentFile)
    {

        $documentFile->delete();
        return redirect()->back();
    }
}
