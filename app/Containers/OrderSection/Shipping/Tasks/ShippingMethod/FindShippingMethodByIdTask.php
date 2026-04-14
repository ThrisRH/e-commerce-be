<?php

namespace App\Containers\OrderSection\Shipping\Tasks\ShippingMethod;

use App\Containers\OrderSection\Shipping\Models\ShippingMethod;
use App\Ship\Parents\Tasks\Task;

class FindShippingMethodByIdTask extends Task
{
    public function run($id): ?ShippingMethod
    {
        return ShippingMethod::find($id);
    }
}
