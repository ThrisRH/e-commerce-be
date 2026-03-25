<?php

namespace App\Providers;

use App\Services\AttributeService;
use App\Services\AttributeValidatorService;
use App\Services\ProductService;
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

        $this->app->singleton(ProductService::class, function () {
            return new ProductService;
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
