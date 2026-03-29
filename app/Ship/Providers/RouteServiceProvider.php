<?php

namespace App\Ship\Providers;

use App\Containers\AppSection\Authentication\Middlewares\CheckTokenMiddlewares;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        app('router')->aliasMiddleware('check.token', CheckTokenMiddlewares::class);

        foreach (glob(app_path('Containers/*/*/UI/API/Routes/*.php')) as $routeFile) {
            $this->loadRoutesFrom($routeFile);
        }
    }
}
