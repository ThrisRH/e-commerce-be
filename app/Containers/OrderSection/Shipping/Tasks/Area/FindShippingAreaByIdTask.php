<?php

namespace App\Containers\OrderSection\Shipping\Tasks\Area;

use App\Containers\OrderSection\Shipping\Models\ShippingArea;
use App\Ship\Parents\Tasks\Task;

class FindShippingAreaByIdTask extends Task
{
    public function run($id): ShippingArea
    {
        return ShippingArea::findOrFail($id);
    }
}
