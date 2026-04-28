<?php

namespace App\Containers\OrderSection\Shipping\Tasks\Route;

use App\Containers\OrderSection\Shipping\Models\ShippingRoute;
use App\Ship\Parents\Tasks\Task;

class DeleteShippingRouteTask extends Task
{
    public function run($id): bool
    {
        return ShippingRoute::destroy($id);
    }
}
