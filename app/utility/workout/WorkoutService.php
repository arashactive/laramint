<?php

namespace App\utility\workout;

use App\Models\Session;
use App\Models\Term;
use App\Models\Workout;
use App\View\Components\front\term as FrontTerm;

abstract class WorkoutService
{
    private static function checkExistWorkout($term_id, $session_id, $activity_id, $sessionable)
    {
        $workout = Workout::where('user_id', auth()->user()->id)
            ->where('term_id', $term_id)
            ->where('session_id', $session_id)
            ->where('activity_id', $activity_id)
            ->where('sessionable_id', $sessionable)
            ->first();

        return empty($workout) ? [] : $workout;
    }


    public static function WorkOutSyncForThisExcersice(Term $term, Session $session, $activity_id, $sessionable)
    {
        $workout = self::checkExistWorkout($term->id, $session->id, $activity_id, $sessionable);

        if (empty($workout)) {
            $workout = new Workout();
            $workout->user_id = auth()->user()->id;
            $workout->term_id = $term->id;
            $workout->session_id = $session->id;
            $workout->activity_id = $activity_id;
            $workout->sessionable_id = $sessionable;
            $workout->date_first_view = now();
            $workout->is_completed = 0;
            $workout->score = 0;
            $workout->save();
            return $workout;
        }

        return $workout;
    }
}
