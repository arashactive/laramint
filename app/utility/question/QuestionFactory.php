<?php

namespace App\utility\question;

use App\Models\Question;
use App\Models\questionType;

class QuestionFactory
{
    
    private static $classPath = "App\\utility\\question\\adabpter\\";
    
    public static function Build($question_type_id)
    {
        $questionType = questionType::findorfail($question_type_id);
        $childQuestion = self::$classPath . $questionType->title;
        return new $childQuestion();

        throw new \Exception('The Question type is not found');
    }

    public static function QuestionBuidler(Question $question){
        $childQuestion = self::$classPath . $question->QuestionType->title;
        $childQuestion = new $childQuestion();
        return $childQuestion->createViewAsLearner($question);

        throw new \Exception('The Question type is not found');
    }



}
