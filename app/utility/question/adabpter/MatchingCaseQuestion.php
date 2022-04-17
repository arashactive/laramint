<?php

namespace App\utility\question\adabpter;

use App\Models\Question;
use App\Models\Workout;
use App\Models\WorkoutQuizLog;
use App\traits\Helpers\Percentage;
use App\utility\question\contract\QuestionAdabpterInterface;


class MatchingCaseQuestion extends QuestionParent implements QuestionAdabpterInterface
{

    use Percentage;

    protected $className = 'matching-case-question';
    


    public function getScore($request)
    {
        $answer = json_decode(self::$question->answer, true);

        $correctAnswerInDatabase = 0;
        $correctAnswerofStudent = 0;

        $requestAnswer = [];

        // get correct answers from database
        $questionCorrectAnswers = $answer['answers'];

        for ($counter = 0; $counter < count($questionCorrectAnswers); $counter++) {
            $correctAnswerInDatabase++;
            $requestAnswerRight = $request->input("answer-" . self::$question->id . '-' . $counter);

            $is_studentCorrectAnswer = false;
            if ($questionCorrectAnswers[$counter]['right'] == $requestAnswerRight) {
                $correctAnswerofStudent++;
                $is_studentCorrectAnswer = true;
            }

            $requestAnswer[] = ['studentAnswer' => $requestAnswerRight, 'correct' => $is_studentCorrectAnswer];
        }



        $score = self::calculatePercentageBetweenTwoNumber($correctAnswerInDatabase, $correctAnswerofStudent);

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
