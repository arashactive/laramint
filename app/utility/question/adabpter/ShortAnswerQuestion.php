<?php

namespace App\utility\question\adabpter;

use App\utility\question\contract\QuestionAdabpterInterface;


class ShortAnswerQuestion extends QuestionParent implements QuestionAdabpterInterface
{

    protected $className = 'short-answer-question';
    protected $is_mentor = true;

    public function getScore($request)
    {
        $answer = json_decode(self::$question->answer, true);

        $questionCorrectAnswer = $answer['correctAnswer'];
        $requestAnswer = $request->input("answer-" . self::$question->id);

        $score = ($questionCorrectAnswer == $requestAnswer) ? 100 : 0;

        self::$workoutQuizQuestion->update(
            [
                'answer' =>  $requestAnswer,
                'score' => $score,
                'is_mentor' => $this->is_mentor
            ]
        );

        parent::workoutScoreUpdate(self::$workout);
        return $score;
    }

}
