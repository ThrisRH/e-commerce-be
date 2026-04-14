<?php

namespace App\Containers\OrderSection\Shipping\Tasks\ShippingRate;

use App\Containers\OrderSection\Shipping\Models\ShippingRate;
use App\Ship\Parents\Tasks\Task;

class CreateShippingRateTask extends Task
{
    public function run(array $data): ShippingRate
    {
        return ShippingRate::create($data);
    }
}
