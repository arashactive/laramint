<?php

namespace App\utility\question\adabpter;

use App\Models\Question;
use App\Models\Workout;
use App\Models\WorkoutQuizLog;
use App\utility\question\contract\QuestionAdabpterInterface;


class VoiceRecordQuestion extends QuestionParent implements QuestionAdabpterInterface
{

    private static $className = 'voice-record-question';
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
