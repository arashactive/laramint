<?php

namespace App\Policies;

use App\Models\Quiz;
use App\Models\Term;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuizPolicy
{
    use HandlesAuthorization;

    public function QuizViewForLearner(User $user, Quiz $quiz, Term $term): null|bool
    {
        
        if ($term->Participants()->where('user_id', $user->id)
        ->where('role_id', 4)->count() == 0) {
            return null;
        }
        
        if (
            Term::with('Sessions.Quizes')
            ->whereHas("Sessions.Quizes", function ($query) use ($quiz) {
                $query->where("quizzes.id", "=", $quiz->id);
            })
            ->where('id', $term->id)
            ->count() == 0
        ) {
            return null;
        }

        return true;
    }
}
