<?php

namespace App\Containers\OrderSection\Shipping\Tasks\Route;

use App\Containers\OrderSection\Shipping\Models\ShippingRoute;
use App\Ship\Parents\Tasks\Task;

class GetAllShippingRoutesTask extends Task
{
    public function run()
    {
        return ShippingRoute::paginate();
    }
}
