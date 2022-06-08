<?php

namespace App\Utility\Modules\Terms;

use App\Models\Participant;
use App\Models\Workout;
use Illuminate\Support\Collection;

class ActivityInfoGenerator
{
    public static function getRelatedStatistic(Collection &$sessionable, Participant $participant, bool $is_mentor = false): Collection
    {
        
        $sessionable->each(function ($sessionable) use ($participant, $is_mentor) {
            $sessionable->Workout = $participant->Workout->where('sessionable_id', $sessionable->id)->first();

            $sessionable->Route = ($is_mentor)
                ? self::makeRouteForMentor($participant->id, $sessionable->Workout)
                : self::makeRouteForLearner($participant->id, $sessionable->id);
        });
        
        return $sessionable;
    }


    /**
     * makes route For mentor
     *
     * @param  int $participant_id
     * @param  mixed $workout
     * @return string
     */
    private static function makeRouteForMentor(int $participant_id, ?Workout $workout): string
    {
        if (!$workout)
            return '';

        return route(
            'reviewWorkout',
            [
                'participant' => $participant_id,
                'workout' => $workout->id
            ]
        );
    }


    /**
     *  makes route For learner
     *
     * @param  int $participant_id
     * @param  int $sessionable_id
     * @return string
     */
    private static function makeRouteForLearner(int $participant_id, int $sessionable_id): string
    {
        return route(
            'taskLearner',
            [
                'participant' => $participant_id,
                'sessionable' => $sessionable_id
            ]
        );
    }
}
