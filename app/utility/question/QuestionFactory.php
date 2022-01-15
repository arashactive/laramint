<?php

namespace App\utility\question;

use App\utility\question\adabpter\TestQuestion;
use Exception;
use App\Models\questionType;

class QuestionFactory
{
    public static function Build($question_type_id)
    {
        $questionType = questionType::findorfail($question_type_id);
        $childQuestion = "App\\utility\\question\\adabpter\\" . $questionType->title;
        return new $childQuestion();

        throw new \Exception('The Question type is not found');
    }
}
