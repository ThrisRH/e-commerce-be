<?php

namespace App\Containers\OrderSection\Shipping\Tasks\Province;

use App\Containers\OrderSection\Shipping\Models\ShippingProvince;
use App\Ship\Parents\Tasks\Task;

class DeleteShippingProvinceTask extends Task
{
    public function run($id): bool
    {
        return ShippingProvince::destroy($id);
    }
}
