<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizRequest extends FormRequest
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
        
        return [
            'title' => 'required',
            'description' => 'required',
            'attempt' => 'required|integer|between:0,50',
            'duration' => 'required|integer|between:0,500',
            'is_mentor' => 'required|boolean',
            'is_shuffle' => 'required|boolean',
            'min_pass_score' => 'required|integer|between:0,100',
            'show_question' => 'required',
            'random_question' => 'required|integer|between:0,100'


        ];
    }
}
