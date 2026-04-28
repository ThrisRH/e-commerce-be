<?php

namespace App\Containers\OrderSection\Shipping\Tasks\City;

use App\Containers\OrderSection\Shipping\Models\ShippingCity;
use App\Ship\Parents\Tasks\Task;

class FindShippingCityByIdTask extends Task
{
    public function run($id): ShippingCity
    {
        return ShippingCity::findOrFail($id);
    }
}
