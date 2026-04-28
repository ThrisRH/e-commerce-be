<?php

namespace App\Containers\OrderSection\Shipping\Actions\Route;

use App\Containers\OrderSection\Shipping\Models\ShippingRoute;
use App\Containers\OrderSection\Shipping\Tasks\Route\CreateShippingRouteTask;
use App\Ship\Parents\Actions\Action;

class CreateShippingRouteAction extends Action
{
    public function run(array $data): ShippingRoute
    {
        return app(CreateShippingRouteTask::class)->run($data);
    }
}
