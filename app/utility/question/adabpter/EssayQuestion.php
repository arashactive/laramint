<?php

namespace App\utility\question\adabpter;

use App\Models\Question;
use App\utility\question\contract\QuestionAdabpterInterface;

class EssayQuestion extends QuestionParent implements QuestionAdabpterInterface
{
    
    private static $className = 'essay-question';

    public static function getCreateUpdateForm()
    {
        return parent::render(self::$className , 'create');
    }

    public static function createViewAsLearner(Question $question)
    {
        return view("livewire.factory.question." . self::$className . ".learner", [
            'question' => $question
        ])->render();
    }

   
}
