<?php

namespace App\Http\Livewire\Box;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithPagination;

class DocumentActivity extends Component
{

    use WithPagination;
    protected string $paginationTheme = 'bootstrap';

    public $session;
    public $activity;

    /**
     * render
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        $documents =  Document::paginate();
        return view('livewire.box.document-activity', compact([
            'documents'
        ]));
    }
}
