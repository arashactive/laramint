<?php

namespace App\Utility\Question\Adabpter;

use App\Utility\Question\Contract\QuestionAdabpterInterface;
use App\Traits\Helpers\Percentage;


class MultipleQuestion extends QuestionParent implements QuestionAdabpterInterface
{

    use Percentage;

    protected string $className = 'multiple-question';
    protected bool $is_mentor = false;

    public function getScore($request)
    {

        $answer = json_decode($this->question->answer, true);

        // set 0 for loop of answers in database and correct-answers of student
        $correctAnswerInDatabase = 0;
        $correctAnswerofStudent = 0;

        // get correct answers from database
        $questionCorrectAnswers = $answer['correctAnswer'];

        
        // get answers of students
        $requestAnswer = $request->input("answer-" . $this->question->id);

        // loop of database correct answer to check score
        for ($counter = 0; $counter <= count($questionCorrectAnswers); $counter++) {

            if (
                isset($questionCorrectAnswers[$counter])
                && (string)$questionCorrectAnswers[$counter] != ""
            ) {

                $correctAnswerInDatabase++;
                // remove "answer-" from correct answer in database
                $index = (int)str_replace('answer-', '', $questionCorrectAnswers[$counter]);

                // check if request index is exist and value is on so student answer is correct
                if (isset($requestAnswer[$index]) && $requestAnswer[$index] == 'on') {
                    $correctAnswerofStudent++;
                }
            }
        }

        $score = $this->calculatePercentageBetweenTwoNumber($correctAnswerInDatabase, $correctAnswerofStudent);
        
        $this->workoutQuizQuestion->update(
            [
                'answer' =>  json_encode($requestAnswer),
                'score' => $score,
                'is_mentor' => $this->is_mentor
            ]
        );

        parent::workoutScoreUpdate($this->workout);
        return $score;
    }


}
