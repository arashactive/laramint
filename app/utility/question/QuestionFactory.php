<?php

namespace App\utility\question;

use App\Models\QuestionType;

class QuestionFactory
{

    private static $classPath = "App\\utility\\question\\adabpter\\";

    public static function Build(QuestionType $questionType)
    {
        $childQuestion = self::$classPath . $questionType->title;
        return new $childQuestion();
        
        throw new \Exception('The Question type is not found');
    }

}
