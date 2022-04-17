<?php

namespace App\utility\question\adabpter;

use App\Models\Question;
use App\Models\Workout;
use App\Models\WorkoutQuizLog;
use App\utility\question\contract\QuestionAdabpterInterface;


class VoiceRecordQuestion extends QuestionParent implements QuestionAdabpterInterface
{

    protected $className = 'voice-record-question';


    public function getScore($request)
    {
        $answer = json_decode(self::$question->answer, true);

        $questionCorrectAnswer = $answer['correctAnswer'];
        $requestAnswer = $request->input("answer-" . self::$question->id);

        $score = ($questionCorrectAnswer == $requestAnswer) ? 100 : 0;

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
