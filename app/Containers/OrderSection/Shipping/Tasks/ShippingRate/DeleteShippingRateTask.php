<?php

namespace App\Containers\OrderSection\Shipping\Tasks\ShippingRate;

use App\Containers\OrderSection\Shipping\Models\ShippingRate;
use App\Ship\Parents\Tasks\Task;

class DeleteShippingRateTask extends Task
{
    public function run(ShippingRate $shippingRate): bool
    {
        return $shippingRate->delete();
    }
}
