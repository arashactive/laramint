<?php

namespace App\Utility\Workout;

use App\Models\Quiz;
use App\Models\Sessionable;
use App\Models\Term;
use App\Models\User;
use App\Models\Workout;
use App\Models\WorkoutQuizLog;
use Illuminate\Support\Facades\Auth;

abstract class WorkoutService
{

    public static function checkExistWorkout($term_id, $sessionable, $user)
    {
       
        $workout = Workout::where('user_id', $user->id)
            ->where('term_id', $term_id)
            ->where('sessionable_id', $sessionable->id)
            ->first();

        return empty($workout) ? [] : $workout;
    }


    public static function WorkOutSyncForThisExcersice(Term $term, Sessionable $sessionable, User $user)
    {
        
        $workout = self::checkExistWorkout($term->id, $sessionable, $user);
        if (empty($workout)) {
            $workout = new Workout();
            $workout->user_id = auth()->user()->id;
            $workout->term_id = $term->id;            
            $workout->sessionable_id = $sessionable->id;
            $workout->date_first_view = now();
            $workout->is_completed = 0;
            $workout->score = 0;
            $workout->save();
            return $workout;
        }

        return $workout;
    }


    public static function setWorkOutQuizSyncForThisExcersice(Workout $workout, Quiz $quiz)
    {
        
        if ($workout->WorkOutQuiz->count() > 0) {
            return [];
        }

        
        foreach ($quiz->Questions as $question) {
            WorkoutQuizLog::create([
                'workout_id' => $workout->id,
                'quiz_id' => $quiz->id,
                'question_id' => $question->id
            ]);
        }
    }
}
