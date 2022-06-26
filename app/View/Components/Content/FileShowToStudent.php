<?php

namespace App\View\Components\Content;

use App\Models\File;
use App\Models\Term;
use App\Traits\ConvertorHelper;
use Illuminate\View\Component;


class FileShowToStudent extends Component
{

    use ConvertorHelper;

    public File $file;
    public Term $term;
    public string $step;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Term $term, File $file, string $step)
    {
        $this->term = $term;
        $this->file = $file;
        $this->step = $step;
    }

    public function toFaIcon(string $file_type = ''): string
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
