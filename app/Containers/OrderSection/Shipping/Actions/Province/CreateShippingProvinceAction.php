<?php

namespace App\Containers\OrderSection\Shipping\Actions\Province;

use App\Containers\OrderSection\Shipping\Models\ShippingProvince;
use App\Containers\OrderSection\Shipping\Tasks\Province\CreateShippingProvinceTask;
use App\Ship\Parents\Actions\Action;

class CreateShippingProvinceAction extends Action
{
    public function run(array $data): ShippingProvince
    {
        return app(CreateShippingProvinceTask::class)->run($data);
    }
}
