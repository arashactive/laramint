<?php

namespace App\Http\Livewire\Activity;

use Livewire\Component;

class Document extends Component
{

    public $activity;
    public $term;
    public $fileRender = '';

    public function showFile(){
        
       
    }

    public function render()
    {
        return view('livewire.activity.document');
    }
}
