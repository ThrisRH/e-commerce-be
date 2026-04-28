<?php

namespace App\Containers\OrderSection\Shipping\Tasks\Area;

use App\Containers\OrderSection\Shipping\Models\ShippingArea;
use App\Ship\Parents\Tasks\Task;

class CreateShippingAreaTask extends Task
{
    public function run(array $data): ShippingArea
    {
        return ShippingArea::create($data);
    }
}
