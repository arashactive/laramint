<?php

namespace App\utility\question;

use App\Models\Question;
use App\Models\Workout;

class WorkoutBuilderFactory
{

    private static $classPath = "App\\utility\\question\\adabpter\\";

    public static function Builder(Question $question, Workout $workout, $request)
    {
        $childQuestion = self::$classPath . $question->QuestionType->title;
        $childQuestion = new $childQuestion();

        return $childQuestion->workoutChecker($question, $workout, $request);

        throw new \Exception('The Question type is not found');
    }

}
