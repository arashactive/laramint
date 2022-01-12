<?php

namespace App\utility\question;

use App\utility\question\adabpter\TestQuestion;
use Exception;

class QuestionFactory
{
    protected static $listener = [
        'TestQuestion' => 'TestQuestion',
        'TrueFalseQuestion' => 'TrueFalseQuestion',
        'MultipleQuestion' => 'MultipleQuestion',
        'EssayQuestion' => 'EssayQuestion',
        'UploadFileQuestion' => 'UploadFileQuestion',
        'ShortAnswerQuestion' => 'ShortAnswerQuestion',
        'MatchingCaseQuestion' => 'MatchingCaseQuestion',
        'VoiceRecordQuestion' => 'VoiceRecordQuestion'
    ];

    protected static $question;

    public static function Build($typeOfQuestion = '')
    {
        if (in_array($typeOfQuestion, self::$listener)) {
            self::$question = $typeOfQuestion;
            
            $childQuestion = "App\\utility\\question\\adabpter\\" . $typeOfQuestion;
            return new $childQuestion();

        } else {
            throw new \Exception('The Question type is not found');
        }
    }
}
