<?php

namespace App\Utility\Question;

use App\Models\QuestionType;

class QuestionFactory
{

    private static $classPath = "App\\Utility\\Question\\Adabpter\\";

    public static function Build(QuestionType $questionType)
    {
        $childQuestion = self::$classPath . $questionType->title;
        return new $childQuestion();
        
        throw new \Exception('The Question type is not found');
    }

}
