<?php

namespace App\Utility\Question;

use App\Models\QuestionType;

class QuestionFactory
{

    private static string $classPath = "App\\Utility\\Question\\Adabpter\\";

    
    /**
     * Build
     *
     * @param  QuestionType $questionType
     * @return object|Exception|void
     */
    public static function Build(QuestionType $questionType)
    {
        $childQuestion = self::$classPath . $questionType->title;
        return new $childQuestion();

        /** @phpstan-ignore-next-line */
        throw new \Exception('The Question type is not found');
    }
}
