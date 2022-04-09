<?php

namespace App\utility\question\adabpter;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\Workout;
use Carbon\Carbon;

abstract class QuestionParent
{

    private $quiz = null;

    public function setQuizId($quiz_id)
    {
        if ((int)$quiz_id > 0)
            $this->quiz = Quiz::findorfail($quiz_id);
        return $this;
    }

    public static function render($questionType, $file)
    {
        return "factory.question.{$questionType}.{$file}";
    }


    public function store($id = [], $attributes)
    {
        if (!empty($this->quiz)) {
            $this->quiz->Questions()->create($attributes, ['order' => $this->quiz->Questions()->max('order') + 1]);
        } else {
            return Question::updateOrCreate($id, $attributes);
        }
    }



    public static function workoutScoreUpdate(Workout $workout)
    {
        $workoutQuiz = $workout->WorkOutQuiz;
        $sumOfScore = 0;
        foreach ($workoutQuiz as $question) {
            $sumOfScore += (int)$question->score;
        }

        $score = (int)($sumOfScore /  count($workoutQuiz));

        $workout->update([
            'score' => $score,
            'is_completed' => 1,
            'date_get_score' => Carbon::now()->format("Y-m-d H:i:s")
        ]);

        return $score;
    }
}
