<?php

namespace App\Containers\OrderSection\Shipping\Tasks\ShippingRate;

use App\Containers\OrderSection\Shipping\Models\ShippingRate;
use App\Ship\Parents\Tasks\Task;

class GetAllShippingRatesTask extends Task
{
    public function run()
    {
        return ShippingRate::with('shippingZone', 'shippingMethod')->get();
    }
}
