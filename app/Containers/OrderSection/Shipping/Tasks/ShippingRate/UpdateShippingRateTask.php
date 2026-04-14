<?php

namespace App\Containers\OrderSection\Shipping\Tasks\ShippingRate;

use App\Containers\OrderSection\Shipping\Models\ShippingRate;
use App\Ship\Parents\Tasks\Task;

class UpdateShippingRateTask extends Task
{
    public function run(ShippingRate $shippingRate, array $data): ShippingRate
    {
        $shippingRate->update($data);

        return $shippingRate->fresh(['shippingZone', 'shippingMethod']);
    }
}
