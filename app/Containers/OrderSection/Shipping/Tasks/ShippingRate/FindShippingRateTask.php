<?php

namespace App\Containers\OrderSection\Shipping\Tasks\ShippingRate;

use App\Containers\OrderSection\Shipping\Models\ShippingRate;
use App\Ship\Parents\Tasks\Task;

class FindShippingRateTask extends Task
{
    public function run(int $shippingZoneId, int $shippingMethodId)
    {
        return ShippingRate::with('shippingZone', 'shippingMethod')
            ->where('shipping_zone_id', $shippingZoneId)
            ->where('shipping_method_id', $shippingMethodId)
            ->first();
    }
}
