<?php

namespace App\Containers\OrderSection\Shipping\Tasks\City;

use App\Containers\OrderSection\Shipping\Models\ShippingCity;
use App\Ship\Parents\Tasks\Task;

class UpdateShippingCityTask extends Task
{
    public function run($id, array $data): ShippingCity
    {
        $city = ShippingCity::findOrFail($id);
        $city->update($data);
        return $city;
    }
}
