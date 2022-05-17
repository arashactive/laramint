<?php

namespace App\Policies;

use App\Models\File;
use App\Models\Term;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class filePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Term  $term
     * @return \Illuminate\Auth\Access\Response|bool|null
     */
    public function view(User $user, File $file, Term $term)
    {


        if ($term->Participants()->where('user_id', $user->id)->count() == 0) {
            return null;
        }

        if (
            Term::with('Sessions.Documents.Files')
            ->whereHas("Sessions.Documents.Files", function ($q) use ($file) {
                $q->where("files.id", "=", $file->id);
            })
            ->where('id', $term->id)
            ->count() == 0
        ) {
            return null;
        }

        return true;
    }
}
