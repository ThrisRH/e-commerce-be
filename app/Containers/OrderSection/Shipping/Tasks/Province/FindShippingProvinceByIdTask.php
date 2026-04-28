<?php

namespace App\Containers\OrderSection\Shipping\Tasks\Province;

use App\Containers\OrderSection\Shipping\Models\ShippingProvince;
use App\Ship\Parents\Tasks\Task;

class FindShippingProvinceByIdTask extends Task
{
    public function run($id): ShippingProvince
    {
        return ShippingProvince::findOrFail($id);
    }
}
