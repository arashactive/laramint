<?php

namespace App\Listeners;

use App\Models\Participant;
use App\Models\User;
use App\Notifications\MentorGetAlertNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class MentorGetAlertListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $term_id = $event->workout->term_id;
        $participants = Participant::select('user_id')->where('term_id', $term_id)
            ->whereIn('role_id', [2,3] )
            ->get();

        $user = User::whereIn('id', $participants)->get();    
        
        Notification::send($user, new MentorGetAlertNotification($event->workout));
    }
}
