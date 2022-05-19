<?php

namespace App\Http\Livewire\Activity;

use App\Models\File;
use App\Models\Term;
use App\Utility\File\FileFactory;
use Livewire\Component;

class Document extends Component
{

    public $activity;
    public Term $term;


    /*
    * $fileRender is an html code to show students.
    */
    public string $fileRender = '';

    public function mount(): void
    {
        if (!empty($this->activity->Files->first()))
            $this->showFile($this->activity->Files->first());
    }

    public function showFile(File $file): void
    {
        $this->fileRender = FileFactory::Build($file)->makeRenderFile();
    }

    /**
     * render
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        return view('livewire.activity.document');
    }
}
