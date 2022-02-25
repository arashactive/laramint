<?php

namespace App\Http\Livewire\Activity;

use App\Models\File;
use App\utility\file\FileFactory;
use Livewire\Component;

class Document extends Component
{

    public $activity;
    public $term;
    
    /*
    * $fileRender is an html code to show students.
    */
    public $fileRender = '';

    
    public function showFile(File $file)
    {
        $this->fileRender = FileFactory::Build($file)->makeRenderFile();
    }

    public function render()
    {
        return view('livewire.activity.document');
    }
}
