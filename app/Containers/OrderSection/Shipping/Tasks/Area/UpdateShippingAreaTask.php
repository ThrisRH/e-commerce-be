<?php

namespace App\Containers\OrderSection\Shipping\Tasks\Area;

use App\Containers\OrderSection\Shipping\Models\ShippingArea;
use App\Ship\Parents\Tasks\Task;

class UpdateShippingAreaTask extends Task
{
    public function run($id, array $data): ShippingArea
    {
        $area = ShippingArea::findOrFail($id);
        $area->update($data);
        return $area;
    }
}
