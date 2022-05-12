<?php

namespace App\Observers;

use App\Events\MentorsGetAlertAfterQuizSubmit;
use App\Models\Workout;

class WorkoutObserver
{
    /**
     * Handle the Workout "created" event.
     *
     * @param  \App\Models\Workout  $workout
     * @return void
     */
    public function created(Workout $workout)
    {
        //
    }

    /**
     * Handle the Workout "updated" event.
     *
     * @param  \App\Models\Workout  $workout
     * @return void
     */
    public function updated(Workout $workout)
    {
        event(new MentorsGetAlertAfterQuizSubmit($workout));
    }

    /**
     * Handle the Workout "deleted" event.
     *
     * @param  \App\Models\Workout  $workout
     * @return void
     */
    public function deleted(Workout $workout)
    {
        //
    }

    /**
     * Handle the Workout "restored" event.
     *
     * @param  \App\Models\Workout  $workout
     * @return void
     */
    public function restored(Workout $workout)
    {
        //
    }

    /**
     * Handle the Workout "force deleted" event.
     *
     * @param  \App\Models\Workout  $workout
     * @return void
     */
    public function forceDeleted(Workout $workout)
    {
        //
    }
}
