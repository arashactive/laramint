<?php

namespace App\Providers;

use App\Utility\Modules\Terms\ParticipantInfoGenerator;
use Illuminate\Support\ServiceProvider;

class LaramintServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(ParticipantInfoGenerator::class, function ($app) {
            return new ParticipantInfoGenerator();
        });

    }
}
