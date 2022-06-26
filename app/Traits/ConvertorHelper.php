<?php


namespace App\Traits;


trait ConvertorHelper
{

    private array $fileTypeToFaIconArray = [
        'img' => 'fa fa-file-image',
    ];
    
    /**
     * fileTypeToFaIcon
     *
     * @param  string $file_type
     * @return string
     */
    public function fileTypeToFaIcon($file_type)
    {
        return $this->fileTypeToFaIconArray[$file_type] ?: 'fa fa-file';
    }
}
