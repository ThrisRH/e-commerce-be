<?php

namespace App\Containers\OrderSection\Shipping\Actions\Route;

use App\Containers\OrderSection\Shipping\Models\ShippingRoute;
use App\Containers\OrderSection\Shipping\Tasks\Route\FindShippingRouteByIdTask;
use App\Ship\Parents\Actions\Action;

class FindShippingRouteByIdAction extends Action
{
    public function run($id): ShippingRoute
    {
        return app(FindShippingRouteByIdTask::class)->run($id);
    }
}
