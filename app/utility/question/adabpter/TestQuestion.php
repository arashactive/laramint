<?php

namespace App\utility\question\adabpter;

use App\utility\question\contract\QuestionAdabpterInterface;


class TestQuestion extends QuestionParent implements QuestionAdabpterInterface
{

    protected $className = 'test-question';
    protected $is_mentor = false;
 
    public function getScore($request)
    {

        $answer = json_decode($this->question->answer, true);

        $questionCorrectAnswer = $answer['correctAnswer'];
        $requestAnswer = $request->input("answer-" . $this->question->id);

        $score = ($questionCorrectAnswer == $requestAnswer) ? 100 : 0;

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
