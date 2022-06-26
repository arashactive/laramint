<?php


namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

trait UploadFiles
{

    /**
     * upload
     *
     * @param  UploadedFile $file
     * @param  string $file_type
     * @return string|bool
     */
    public function upload(UploadedFile $file, string $file_type)
    {
        $path = $file->store('public/' . $file_type);

        return $path;
    }


    /**
     * upload_file_by_student
     *
     * @param  UploadedFile $file
     * @return string|bool
     */
    public function upload_file_by_student(UploadedFile $file)
    {
        
        $path = '';
        if (isset(Auth::user()->id) && Auth::user()->id > 0)
            $path = $file->store('public/student_' . Auth::user()->id);

        return $path;
    }


     
    /**
     * delete
     *
     * @param  string $file_name
     * @return bool
     */
    public function delete($file_name): bool
    {
        return Storage::delete($file_name);
    }
}
