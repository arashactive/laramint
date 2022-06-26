<?php

namespace App\Utility\Question\Adabpter;

use App\Utility\Question\Contract\QuestionAdabpterInterface;

use App\Traits\Helpers\Percentage;


class MatchingCaseQuestion extends QuestionParent implements QuestionAdabpterInterface
{

    use Percentage;

    protected string $className = 'matching-case-question';
    protected bool $is_mentor = false;


    public function getScore($request)
    {
        $answer = json_decode($this->question->answer, true);

        $correctAnswerInDatabase = 0;
        $correctAnswerofStudent = 0;

        $requestAnswer = [];

        // get correct answers from database
        $questionCorrectAnswers = $answer['answers'];

        for ($counter = 0; $counter < count($questionCorrectAnswers); $counter++) {
            $correctAnswerInDatabase++;
            $requestAnswerRight = $request->input("answer-" . $this->question->id . '-' . $counter);

            $is_studentCorrectAnswer = false;
            if ($questionCorrectAnswers[$counter]['right'] == $requestAnswerRight) {
                $correctAnswerofStudent++;
                $is_studentCorrectAnswer = true;
            }

            $requestAnswer[] = ['studentAnswer' => $requestAnswerRight, 'correct' => $is_studentCorrectAnswer];
        }



        $score = $this->calculatePercentageBetweenTwoNumber($correctAnswerInDatabase, $correctAnswerofStudent);

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
