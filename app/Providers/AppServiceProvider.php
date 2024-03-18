<?php

namespace App\Providers;

use App\Events\UserRegistered;
use App\Listeners\AssignPlanetToUser;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    protected $listen = [
        UserRegistered::class => [
            AssignPlanetToUser::class
        ]
    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
