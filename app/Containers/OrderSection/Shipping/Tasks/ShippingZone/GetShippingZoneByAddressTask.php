<?php

namespace App\Containers\OrderSection\Shipping\Tasks\ShippingZone;

use App\Containers\OrderSection\Shipping\Models\ShippingZoneArea;
use App\Ship\Parents\Tasks\Task;

class GetShippingZoneByAddressTask extends Task
{
    public function run(string $province, string $district, ?string $ward = null)
    {
        $query = ShippingZoneArea::where('province', 'LIKE', '%' . $province . '%')
            ->where('distince', 'LIKE', '%' . $district . '%');

        if ($ward) {
            $query->where('ward', 'LIKE', '%' . $ward . '%');
        }

        $area = $query->first();

        return $area ? $area->shippingZone : null;
    }
}
