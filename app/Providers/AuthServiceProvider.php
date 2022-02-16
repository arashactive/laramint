<?php

namespace App\Providers;

use App\Models\Term;
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
