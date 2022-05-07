<?php


namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

trait UploadFiles
{

    /**
     * upload file to file_type folder
     *
     */
    public function upload($file, $file_type)
    {
        $path = $file->store('public/'. $file_type);

        return $path;
    }


    public function upload_file_by_student($file){
        $path = $file->store('public/student_' . Auth::user()->id);
        
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
