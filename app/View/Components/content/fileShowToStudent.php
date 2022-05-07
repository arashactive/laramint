<?php

namespace App\View\Components\Content;

use App\traits\ConvertorHelper;
use Illuminate\View\Component;


class FileShowToStudent extends Component
{

    use ConvertorHelper;
    
    public $file;
    public $term;
    public $step;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($term, $file, $step)
    {
        $this->term = $term;
        $this->file = $file;
        $this->step = $step;
    }

    public function toFaIcon($file_type = ''): string
    {
        return (string)$this->fileTypeToFaIcon($file_type);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.content.file-show-to-student');
    }
}
