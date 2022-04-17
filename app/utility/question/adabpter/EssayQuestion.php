<?php

namespace App\utility\question\adabpter;

use App\Models\Question;
use App\Models\Workout;
use App\Models\WorkoutQuizLog;
use App\utility\question\contract\QuestionAdabpterInterface;

class EssayQuestion extends QuestionParent implements QuestionAdabpterInterface
{

    protected $className = 'essay-question';




    public function getScore($request)
    {

        $requestAnswer = json_encode($request->input("answer-" . self::$question->id));
        $score = 0;

        self::$workoutQuizQuestion->update(
            [
                'answer' =>  $requestAnswer,
                'score' => $score
            ]
        );

        parent::workoutScoreUpdate(self::$workout);
        return $score;
    }


    
}
