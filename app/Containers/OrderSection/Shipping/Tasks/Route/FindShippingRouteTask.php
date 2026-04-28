<?php

namespace App\Containers\OrderSection\Shipping\Tasks\Route;

use App\Containers\OrderSection\Shipping\Models\ShippingRoute;
use App\Ship\Parents\Tasks\Task;

class FindShippingRouteTask extends Task
{
    public function run(int $startAreaId, int $endAreaId)
    {
        return ShippingRoute::where('start_id', $startAreaId)
            ->where('end_id', $endAreaId)
            ->first();
    }
}
