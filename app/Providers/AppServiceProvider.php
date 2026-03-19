<?php

namespace App\Providers;

use App\Services\AttributeService;
use App\Services\AttributeValidatorService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(AttributeService::class, function () {
            return new AttributeService;
        });

        $this->app->singleton(AttributeValidatorService::class, function () {
            return new AttributeValidatorService;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
