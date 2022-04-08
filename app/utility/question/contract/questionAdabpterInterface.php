<?php

namespace App\utility\question\contract;

use App\Models\Question;
use App\Models\Workout;

interface QuestionAdabpterInterface
{
    public static function getCreateUpdateForm();

    public static function createViewAsLearner(Question $question, Workout $workout);
    public static function workoutChecker(Question $question, Workout $workout, $request);
}
