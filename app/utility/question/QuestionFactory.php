<?php

namespace App\utility\question;

use App\Models\Question;
use App\Models\questionType;
use App\Models\Workout;

class QuestionFactory
{

    private static $classPath = "App\\utility\\question\\adabpter\\";

    public static function Build($question_type_id)
    {
        $childQuestion = self::ChildQuestion(questionType::findorfail($question_type_id));
        return new $childQuestion();

        throw new \Exception('The Question type is not found');
    }

    public static function QuestionBuidler(Question $question, Workout $workout)
    {
        $childQuestion = self::ChildQuestion($question->QuestionType);
        return $childQuestion->createViewAsLearner($question, $workout);

        throw new \Exception('The Question type is not found');
    }


    private static function ChildQuestion(questionType $questionType)
    {
        $childQuestion = self::$classPath . $questionType->title;
        return $childQuestion = new $childQuestion();
    }
}
