<?php

namespace App\Http\Livewire\Factory\Question\UploadFileQuestion;

use App\Http\Livewire\Factory\Question\QuestionComponents;

class Create extends QuestionComponents
{

    public function mount(){
        $this->answers = [
            'max_size' => 1024,
            'min_size' => 128,
            'file_type' => 'pdf,word,excel,images'
        ];
        if($this->question){
            $this->setValueWithQuestion();
        }

    }

    public function render()
    {
        return view('livewire.factory.question.upload-file-question.create');
    }
}
