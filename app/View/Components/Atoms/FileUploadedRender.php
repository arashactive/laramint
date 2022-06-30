<?php

namespace App\View\Components\Atoms;

use Illuminate\View\Component;


class FileUploadedRender extends Component
{

    public string $file = '';

    public bool $preview = true;

    public string $fileType = '';

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $file, bool $preview = true)
    {
        $this->file = $file;

        $this->fileType = $this->getFileType($file);
        $this->preview = $preview;
        
    }

    private function getFileType(string $file): string
    {
        $fileType = pathinfo($file, PATHINFO_EXTENSION);
        if ($fileType == 'jpg' || $fileType == 'jpeg' || $fileType == 'png' || $fileType == 'gif') {
            return 'image';
        } elseif ($fileType == 'mp4' || $fileType == 'webm' || $fileType == 'ogg') {
            return 'video';
        } elseif ($fileType == 'mp3' || $fileType == 'wav' || $fileType == 'ogg') {
            return 'audio';
        }
        return 'file';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.atoms.file-uploaded-render');
    }
}
