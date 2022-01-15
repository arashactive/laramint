<?php

namespace App\utility\question\adabpter;

use App\Models\Question;
use App\Models\Quiz;

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
            $this->quiz->Questions()->create($attributes);
        } else {
            return Question::updateOrCreate($id, $attributes);
        }
    }
}
