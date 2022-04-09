<?php

namespace App\utility\question;

use App\Models\Question;
use App\Models\Workout;

class ReviewBuilderFactory
{

    private static $classPath = "App\\utility\\question\\adabpter\\";

    public static function Builder(Question $question, Workout $workout)
    {
    
        $childQuestion = self::$classPath . $question->QuestionType->title;
        
        $childQuestion = new $childQuestion();

        return $childQuestion->ReviewChecker($question, $workout);

        throw new \Exception('The Question type is not found');
    }

}
