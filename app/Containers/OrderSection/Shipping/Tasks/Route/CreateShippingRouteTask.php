<?php

namespace App\Containers\OrderSection\Shipping\Tasks\Route;

use App\Containers\OrderSection\Shipping\Models\ShippingRoute;
use App\Ship\Parents\Tasks\Task;

class CreateShippingRouteTask extends Task
{
    public function run(array $data): ShippingRoute
    {
        return ShippingRoute::create($data);
    }
}
