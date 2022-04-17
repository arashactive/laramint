<?php

namespace App\utility\question\adabpter;

use App\utility\question\traits\CreateUpdateForm;
use App\utility\question\traits\WorkoutViewRender;

abstract class QuestionParent
{
    use CreateUpdateForm, WorkoutViewRender;

    protected $className;
}
