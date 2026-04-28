<?php

namespace App\Containers\OrderSection\Shipping\Tasks\Route;

use App\Containers\OrderSection\Shipping\Models\ShippingRoute;
use App\Ship\Parents\Tasks\Task;

class FindShippingRouteByIdTask extends Task
{
    public function run($id): ShippingRoute
    {
        return ShippingRoute::findOrFail($id);
    }
}
