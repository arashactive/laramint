<?php

namespace App\utility\file\adabpter;

use App\Models\File;
use App\utility\file\services\fileParent;

class AudioClass extends fileParent
{

    public function __construct(File $file)
    {
        $this->file = $file;
        $this->view = 'utility/file/audio';    
    }
    
    
}