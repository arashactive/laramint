<?php

namespace App\utility\question;

use App\Models\Question;
use App\Models\questionType;
use App\Models\Workout;

class QuestionFactory
{

    private static $classPath = "App\\utility\\question\\adabpter\\";

    public static function Build(questionType $questionType)
    {
        $childQuestion = self::$classPath . $questionType->title;
        return new $childQuestion();
        
        throw new \Exception('The Question type is not found');
    }

}
