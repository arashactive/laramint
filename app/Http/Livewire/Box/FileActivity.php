<?php

namespace App\Http\Livewire\Box;

use App\Models\File;
use Livewire\Component;
use Livewire\WithPagination;

class FileActivity extends Component
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
        $files =  File::paginate();
        return view('livewire.box.file-activity', compact([
            'files'
        ]));
    }
}
