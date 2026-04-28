<?php

namespace App\Containers\OrderSection\Shipping\Tasks\Province;

use App\Containers\OrderSection\Shipping\Models\ShippingProvince;
use App\Ship\Parents\Tasks\Task;

class UpdateShippingProvinceTask extends Task
{
    public function run($id, array $data): ShippingProvince
    {
        $province = ShippingProvince::findOrFail($id);
        $province->update($data);
        return $province;
    }
}
