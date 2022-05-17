<?php

namespace App\Policies;

use App\Models\Feedback;
use App\Models\Term;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FeedbackPolicy
{
    use HandlesAuthorization;
 /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Feedback  $feedback
     * @param  \App\Models\Term  $term
     * @return \Illuminate\Auth\Access\Response|bool|null
     */
    public function feedbackViewForLearner(User $user, Feedback $feedback, Term $term)
    {
        
        if ($term->Participants()->where('user_id', $user->id)->count() == 0) {
            return null;
        }
        
        if (
            Term::with('Sessions.Feedbacks')
            ->whereHas("Sessions.Feedbacks", function ($query) use ($feedback) {
                $query->where("feedback.id", "=", $feedback->id);
            })
            ->where('id', $term->id)
            ->count() == 0
        ) {
            return null;
        }

        return true;
    }
}
