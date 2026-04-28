<?php

namespace App\Containers\OrderSection\Shipping\Actions\Province;

use App\Containers\OrderSection\Shipping\Models\ShippingProvince;
use App\Containers\OrderSection\Shipping\Tasks\Province\UpdateShippingProvinceTask;
use App\Ship\Parents\Actions\Action;

class UpdateShippingProvinceAction extends Action
{
    public function run($id, array $data): ShippingProvince
    {
        return app(UpdateShippingProvinceTask::class)->run($id, $data);
    }
}
