<?php

namespace App\Utility\File\Adabpter;

use App\Models\File;
use App\Utility\File\Services\FileParent;

class PdfClass extends fileParent
{

    public function __construct(File $file)
    {
        $this->file = $file;
        $this->view = 'utility/file/pdf';    
    }
    
    
}