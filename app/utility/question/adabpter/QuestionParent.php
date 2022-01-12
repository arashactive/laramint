<?php

namespace App\utility\question\adabpter;

abstract class QuestionParent
{

    public static function render($questionType , $file){
        return "factory.question.{$questionType}.{$file}";
    }


}
