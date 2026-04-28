<?php

namespace App\Containers\OrderSection\Shipping\Tasks\City;

use App\Containers\OrderSection\Shipping\Models\ShippingCity;
use App\Ship\Parents\Tasks\Task;

class GetAllShippingCitiesTask extends Task
{
    public function run()
    {
        return ShippingCity::paginate();
    }
}
