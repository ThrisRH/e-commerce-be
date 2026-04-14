<?php

namespace App\Containers\OrderSection\Shipping\Tasks\ShippingRate;

use App\Containers\OrderSection\Shipping\Models\ShippingRate;
use App\Ship\Parents\Tasks\Task;

class FindShippingRateByIdTask extends Task
{
    public function run(int $id): ?ShippingRate
    {
        return ShippingRate::with('shippingZone', 'shippingMethod')->find($id);
    }
}
