<?php

namespace App\Containers\OrderSection\Shipping\Tasks\City;

use App\Containers\OrderSection\Shipping\Models\ShippingCity;
use App\Ship\Parents\Tasks\Task;

class DeleteShippingCityTask extends Task
{
    public function run($id): bool
    {
        return ShippingCity::destroy($id);
    }
}
