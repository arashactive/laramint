<?php

namespace App\Providers;

use App\Models\Feedback;
use App\Models\File;
use App\Models\Quiz;
use App\Models\Term;
use App\Policies\FeedbackPolicy;
use App\Policies\filePolicy;
use App\Policies\QuizPolicy;
use App\Policies\TermPolicy;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Term::class => TermPolicy::class,
        File::class => filePolicy::class,
        Feedback::class => FeedbackPolicy::class,
        Quiz::class => QuizPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {

        $this->registerPolicies();

        Gate::before(function ($user, $ability) {
            return $user->hasRole('Super-Admin') ?: null;
        });
    }
}
