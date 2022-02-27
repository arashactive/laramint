<?php

namespace App\utility\question\contract;

use App\Models\Question;

interface QuestionAdabpterInterface
{
    public static function getCreateUpdateForm();
    public static function createViewAsLearner(Question $question);
}
