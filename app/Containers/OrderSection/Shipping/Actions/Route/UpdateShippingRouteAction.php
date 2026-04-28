<?php

namespace App\Containers\OrderSection\Shipping\Actions\Route;

use App\Containers\OrderSection\Shipping\Models\ShippingRoute;
use App\Containers\OrderSection\Shipping\Tasks\Route\UpdateShippingRouteTask;
use App\Ship\Parents\Actions\Action;

class UpdateShippingRouteAction extends Action
{
    public function run($id, array $data): ShippingRoute
    {
        return app(UpdateShippingRouteTask::class)->run($id, $data);
    }
}
