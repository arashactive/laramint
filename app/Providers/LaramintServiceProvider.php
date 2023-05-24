<?php

namespace App\Providers;

use App\Repositories\Contracts\DepartmentInterfaceRepository;
use App\Repositories\Contracts\CourseInterfaceRepository;
use App\Repositories\Contracts\PlanInterfaceRepository;
use App\Repositories\Contracts\SessionTermInterfaceRepository;
use App\Repositories\Contracts\TermInterfaceRepository;
use App\Repositories\Models\CourseRepository;
use App\Repositories\Models\DepartmentRepository;
use App\Repositories\Models\PlanRepository;
use App\Repositories\Models\SessionTermRepository;
use App\Repositories\Models\TermRepository;
use App\Utility\Modules\Terms\ParticipantInfoGenerator;
use Illuminate\Support\ServiceProvider;

class LaramintServiceProvider extends ServiceProvider
{

    protected $repositories = [
        'Course', 'Department', 'Term', 'Plan', 'SessionTerm'
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CourseInterfaceRepository::class, CourseRepository::class);
        $this->app->bind(DepartmentInterfaceRepository::class, DepartmentRepository::class);
        $this->app->bind(TermInterfaceRepository::class, TermRepository::class);
        $this->app->bind(PlanInterfaceRepository::class, PlanRepository::class);
        $this->app->bind(SessionTermInterfaceRepository::class, SessionTermRepository::class);
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
