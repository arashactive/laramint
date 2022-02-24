<?php

namespace App\utility\file;



class FileFactory
{
    public static function Build($file)
    {
        // $questionType = questionType::findorfail($question_type_id);
        // $childQuestion = "App\\utility\\question\\adabpter\\" . $questionType->title;
        // return new $childQuestion();

        throw new \Exception('The Question type is not found');
    }
}