<?php


namespace App\traits;


trait ConvertorHelper
{

    private $fileTypeToFaIconArray = [
        'img' => 'fa fa-file-image',
    ];
    
    public function fileTypeToFaIcon($file_type)
    {
        return $this->fileTypeToFaIconArray[$file_type] ?: 'fa fa-file';
    }

    

}