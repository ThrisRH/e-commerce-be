<?php

namespace App\Containers\OrderSection\Shipping\Tasks\Route;

use App\Containers\OrderSection\Shipping\Models\ShippingRoute;
use App\Ship\Parents\Tasks\Task;

class UpdateShippingRouteTask extends Task
{
    public function run($id, array $data): ShippingRoute
    {
        $route = ShippingRoute::findOrFail($id);
        $route->update($data);
        return $route;
    }
}
