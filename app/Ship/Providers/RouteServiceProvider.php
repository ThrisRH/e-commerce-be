<?php

namespace App\Ship\Providers;

use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        foreach (glob(app_path('Containers/*/*/UI/API/Routes/*.php')) as $routeFile) {
            $this->loadRoutesFrom($routeFile);
        }
    }
}
