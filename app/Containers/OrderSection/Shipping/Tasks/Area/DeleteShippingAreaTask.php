<?php

namespace App\Containers\OrderSection\Shipping\Tasks\Area;

use App\Containers\OrderSection\Shipping\Models\ShippingArea;
use App\Ship\Parents\Tasks\Task;

class DeleteShippingAreaTask extends Task
{
    public function run($id): bool
    {
        return ShippingArea::destroy($id);
    }
}
