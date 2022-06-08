<?php

namespace App\Utility\Modules\Terms;

use App\Models\Participant;
use App\Models\User;
use App\Models\Workout;
use Illuminate\Database\Eloquent\Collection;

class ParticipantInfoGenerator
{

    public static function getTermStatistic(Participant $participant, bool $is_mentor = false): Participant
    {
        $participant =  Participant::with('User', 'Workout', 'Term.Sessions.Related')
            ->find($participant->id);


        SessionInfoGenerator::getSessionStatistic($participant, $is_mentor);

        return $participant;
    }

    public static function getAllTermsForParticipant(User $user, bool $is_mentor = false): Collection
    {
        $terms = Participant::with('Term', 'Workout')
            ->where('user_id', $user->id)
            ->get();
        
        foreach ($terms as $term) {
            $term->Term->total_task = $term->Term->all_activities->count();
            $term->Term->task_done = $term->Workout->where('is_completed', '1')->count();
        }

        $terms->is_mentor = $is_mentor;
        return $terms;
    }


    public static function getLastActivityForUser(User $user): Collection
    {
        $particpantsIds = Participant::where('user_id', $user->id)
            ->pluck('id');

        $lastActivities = Workout::whereIn('participant_id', $particpantsIds)
            ->orderby('created_at', 'desc')
            ->limit(10)
            ->get();

        return $lastActivities;
    }
}
