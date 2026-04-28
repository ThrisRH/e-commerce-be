<?php

namespace App\Containers\OrderSection\Shipping\Tasks\City;

use App\Containers\OrderSection\Shipping\Data\Repositories\ShippingCityRepository;
use App\Containers\OrderSection\Shipping\Models\ShippingCity;
use App\Ship\Parents\Tasks\Task;

class CreateShippingCityTask extends Task
{
    public function run(array $data): ShippingCity
    {
        return ShippingCity::create($data);
    }
}
