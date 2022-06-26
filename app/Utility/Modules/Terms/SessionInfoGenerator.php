<?php

namespace App\Utility\Modules\Terms;

use App\Models\Participant;
use App\Models\Session;
use App\Models\Workout;

class SessionInfoGenerator
{
    

    public static function getSessionStatistic(Participant &$participant, bool $is_mentor = false): Participant
    {

        foreach ($participant->Term->Sessions as $session) {

            ActivityInfoGenerator::getRelatedStatistic($session->Related, $participant, $is_mentor);
            
            $session->workout_completed =  self::getCountOfCompletedWork($session, $participant->Workout);
            $session->workout_score =  self::getAvgOfCompletedWork($session, $participant->Workout);
        }

        return $participant;
    }


    public static function getCountOfCompletedWork(Session $session, $Workout): int
    {
        return $Workout->whereIn('sessionable_id', $session->Related->pluck('id')->toArray())
            ->where('is_completed', 1)->count();
    }

    public static function getAvgOfCompletedWork(Session $session, $Workout): int
    {
        return (int)$Workout->whereIn('sessionable_id', $session->Related->pluck('id')->toArray())
            ->where('is_completed', 1)->avg('score');
    }
}
