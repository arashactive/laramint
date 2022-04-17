<?php

namespace App\utility\question\adabpter;

use App\utility\question\contract\QuestionAdabpterInterface;

class EssayQuestion extends QuestionParent implements QuestionAdabpterInterface
{

    protected $className = 'essay-question';
    protected $is_mentor = true;

    public function getScore($request)
    {

        $requestAnswer = json_encode($request->input("answer-" . $this->question->id));
        $score = 0;

        $this->workoutQuizQuestion->update(
            [
                'answer' =>  $requestAnswer,
                'score' => $score,
                'is_mentor' => $this->is_mentor
            ]
        );

        parent::workoutScoreUpdate($this->workout);
        return $score;
    }


    
}
