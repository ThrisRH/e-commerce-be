<?php

namespace App\Containers\OrderSection\Shipping\Tasks\Route;

use App\Containers\OrderSection\Shipping\Models\ShippingRoute;
use App\Ship\Parents\Tasks\Task;

class FindShippingRouteByNameTask extends Task
{
    public function run($fromAreaId, $toAreaId)
    {
        $route = ShippingRoute::where('start_id', $fromAreaId)
            ->where('end_id', $toAreaId)
            ->first();

        if (! $route) {
            throw new \Exception('Shipping route not found');
        }

        return $route;
    }
}
