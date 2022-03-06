<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules =  [
            'title' => 'required',
            'file' => 'required',
        ];


        if ($this->input('fileType') == 'audio') {
            $rules['file'] = 'mimes:mp3,mp4';
        }

        if ($this->input('fileType') == 'video') {
            $rules['file'] = 'mimes:mp4,3gp';
        }

        if ($this->input('fileType') == 'image') {
            $rules['file'] = 'mimes:jpg,jpeg,gif';
        }

        

        return $rules;
    }
}
