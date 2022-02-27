<?php


namespace App\traits;
use Illuminate\Support\Facades\Storage;

trait UploadFiles
{

    /**
     * upload file to file_type folder
     *
     */
    public function upload($file, $file_type)
    {
        $path = $file->store('storage/'. $file_type);

        return $path;
    }


    /**
     * upload file to file_type folder
     *
     */
    public function delete($file_name)
    {
        return Storage::delete($file_name);
    }
}
