<?php

namespace App\Utility\Modules\Terms;

use App\Models\Participant;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class ParticipantInfoGenerator
{

    public static function getTermStatistic(Participant $participant): Participant
    {
        return Participant::with('User', 'Workout', 'Term.Sessions.Related')
            ->find($participant->id);
    }

    public static function getAllTermsForParticipant(User $user, bool $is_mentor = false): Collection
    {
        $terms = $user->Terms;
        $terms->is_mentor = $is_mentor;
        return $terms;
    }
}
