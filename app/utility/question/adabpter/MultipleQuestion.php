<?php

namespace App\utility\question\adabpter;

use App\Models\Question;
use App\utility\question\contract\QuestionAdabpterInterface;


class MultipleQuestion extends QuestionParent implements QuestionAdabpterInterface
{
    
    private static $className = 'multiple-question';

    public static function getCreateUpdateForm()
    {
        return parent::render(self::$className , 'create');
    }

    public static function createViewAsLearner(Question $question)
    {
        $answer = json_decode($question->answer, false);

        return view("livewire.factory.question." . self::$className . ".learner", [
            'question' => $question,
            'answer' => $answer
        ])->render();
    }
}
