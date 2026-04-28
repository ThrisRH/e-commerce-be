<?php

namespace App\Containers\OrderSection\Shipping\Tasks\Province;

use App\Containers\OrderSection\Shipping\Models\ShippingProvince;
use App\Ship\Parents\Tasks\Task;

class GetAllShippingProvincesTask extends Task
{
    public function run()
    {
        return ShippingProvince::paginate();
    }
}
