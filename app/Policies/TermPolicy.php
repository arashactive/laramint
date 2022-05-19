<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Term;
use Illuminate\Auth\Access\HandlesAuthorization;

class TermPolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Term  $term
     * @return bool|null
     */
    public function participantAccessToTerm(User $user, Term $term)
    {
        return $term->Participants()->where('user_id', $user->id)->count() > 0 ?: null;
    }
}
