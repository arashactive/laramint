<?php

namespace App\View\Components\Atoms;

use App\Traits\Helpers\FileSize as HelpersFileSize;
use Illuminate\View\Component;

class FileSize extends Component
{
    use HelpersFileSize;

    public string $fileSize;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(int $fileSize)
    {
        $this->fileSize = $this->convertBytesToMBString($fileSize);
    }


    

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.atoms.file-size');
    }
}
