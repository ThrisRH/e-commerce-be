<?php

namespace App\Containers\OrderSection\Shipping\Tasks\Province;

use App\Containers\OrderSection\Shipping\Models\ShippingProvince;
use App\Ship\Parents\Tasks\Task;

class CreateShippingProvinceTask extends Task
{
    public function run(array $data): ShippingProvince
    {
        return ShippingProvince::create($data);
    }
}
