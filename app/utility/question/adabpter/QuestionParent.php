<?php

namespace App\Utility\Question\Adabpter;

use App\Utility\Question\Traits\CreateUpdateForm;
use App\Utility\Question\Traits\WorkoutViewRender;

abstract class QuestionParent
{
    use CreateUpdateForm, WorkoutViewRender;

    protected string $className;
    protected bool $is_mentor;
}
