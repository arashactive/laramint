<?php

namespace App\utility\question\adabpter;

use App\Models\Question;
use App\Models\Workout;
use App\utility\question\contract\QuestionAdabpterInterface;


class MatchingCaseQuestion extends QuestionParent implements QuestionAdabpterInterface
{

    private static $className = 'matching-case-question';

    public static function getCreateUpdateForm()
    {
        return parent::render(self::$className, 'create');
    }

    public static function createViewAsLearner(Question $question, Workout $workout)
    {
        $answer = json_decode($question->answer, false);

        return view("livewire.factory.question." . self::$className . ".learner", [
            'question' => $question,
            'answer' => $answer,
            'workout' => $workout
        ])->render();
    }
}
