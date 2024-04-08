<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            'App\Interfaces\FairInterface',
            'App\Repositories\FairDateRepository',
            'App\Interfaces\ActivityInterface',
            'App\Repositories\ActivityDateRepository',
            'App\Interfaces\BookingInterface',
            'App\Repositories\BookingRepository',
            'App\Interfaces\FairActivityInterface',
            'App\Repositories\FairActivityRepository'
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
