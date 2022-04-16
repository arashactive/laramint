<?php

namespace App\utility\question\adabpter;

use App\Models\Question;
use App\Models\Workout;
use App\Models\WorkoutQuizLog;
use App\traits\Helpers\Percentage;
use App\utility\question\contract\QuestionAdabpterInterface;


class MultipleQuestion extends QuestionParent implements QuestionAdabpterInterface
{

    use Percentage;

    private static $className = 'multiple-question';
    private static $question;
    private static $workout;
    private static $workoutQuizQuestion;

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

    public static function workoutChecker(Question $question, Workout $workout, $request)
    {
        $workoutQuizQuestion = WorkoutQuizLog::where('workout_id', $workout->id)
            ->where('question_id', $question->id)->first();

        self::$question = $question;
        self::$workout = $workout;
        self::$workoutQuizQuestion = $workoutQuizQuestion;

        self::getScore($request);
    }


    public static function getScore($request)
    {
        $answer = json_decode(self::$question->answer, true);

        // set 0 for loop of answers in database and correct-answers of student
        $correctAnswerInDatabase = 0;
        $correctAnswerofStudent = 0;

        // get correct answers from database
        $questionCorrectAnswers = $answer['correctAnswer'];

        // get answers of students
        $requestAnswer = $request->input("answer-" . self::$question->id);

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

        $score = self::calculatePercentageBetweenTwoNumber($correctAnswerInDatabase, $correctAnswerofStudent);
        
        self::$workoutQuizQuestion->update(
            [
                'answer' =>  json_encode($requestAnswer),
                'score' => $score
            ]
        );

        parent::workoutScoreUpdate(self::$workout);
        return $score;
    }


    public static function ReviewChecker(Question $question, Workout $workout)
    {
        $answers = json_decode($question->answer, false);

        return view("livewire.factory.question." . self::$className . ".review", [
            'question' => $question,
            'answers' => $answers->answers,
            'correctAnswer' => $answers->correctAnswer,
            'workout' => $workout,
            'title' => $question->title,
            'question_body' => $question->question_body
        ])->render();
    }
}
