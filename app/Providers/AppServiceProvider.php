<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
        Validator::extend('allowed_email_domains', function ($attribute, $value, $parameters, $validator) {
            $allowedDomains = ['@ieb.cat', '@institutaliments.barcelona', 'aites@gmail.com'];

            foreach ($allowedDomains as $domain) {
                if (Str::contains($value, $domain)) {
                    return true;
                }
            }

            return false;
        },
        'El domini de correu electrònic no està permès.');
    }
}
