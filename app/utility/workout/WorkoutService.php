<?php

namespace App\Utility\Workout;

use App\Models\Quiz;
use App\Models\Sessionable;
use App\Models\Term;
use App\Models\User;
use App\Models\Workout;
use App\Models\WorkoutQuizLog;

abstract class WorkoutService
{

    public static function checkExistWorkout(int $term_id, Sessionable $sessionable, User $user): ?Workout
    {

        $workout = Workout::where('user_id', $user->id)
            ->where('term_id', $term_id)
            ->where('sessionable_id', $sessionable->id)
            ->first();

        return $workout;
    }


    public static function WorkOutSyncForThisExcersice(Term $term, Sessionable $sessionable, User $user): Workout
    {

        $workout = self::checkExistWorkout($term->id, $sessionable, $user);
        if (empty($workout)) {
            $workout = new Workout();
            $workout->user_id = $user->id;
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


    public static function setWorkOutQuizSyncForThisExcersice(Workout $workout, Quiz $quiz): ?array
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

        return null;
    }
}
