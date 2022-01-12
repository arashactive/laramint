<?php

namespace App\utility\question\adabpter;
use App\Models\Question;

abstract class QuestionParent
{

    public static function render($questionType , $file){
        return "factory.question.{$questionType}.{$file}";
    }


    public function store($id = [], $attributes){
        return Question::updateOrCreate($id , $attributes);
    }

}
