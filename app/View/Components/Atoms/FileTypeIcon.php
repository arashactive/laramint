<?php

namespace App\View\Components\Atoms;

use Illuminate\View\Component;

class FileTypeIcon extends Component
{

    public string $fileType;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $fileType)
    {
        $this->fileType = $fileType;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.atoms.file-type-icon');
    }
}
