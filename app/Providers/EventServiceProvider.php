<?php

namespace App\Providers;

use App\Events\CommentCreated;
use App\Events\MentorsGetAlertAfterQuizSubmit;
use App\Listeners\CommentCreatedListener;
use App\Listeners\MentorGetAlertListener;
use App\Observers\WorkoutObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Models\Workout;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        CommentCreated::class => [
            CommentCreatedListener::class
        ],
        MentorsGetAlertAfterQuizSubmit::class => [
            MentorGetAlertListener::class
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Workout::observe(WorkoutObserver::class);
    }
}
