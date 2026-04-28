<?php

namespace App\Containers\OrderSection\Shipping\Actions\Province;

use App\Containers\OrderSection\Shipping\Models\ShippingProvince;
use App\Containers\OrderSection\Shipping\Tasks\Province\FindShippingProvinceByIdTask;
use App\Ship\Parents\Actions\Action;

class FindShippingProvinceByIdAction extends Action
{
    public function run($id): ShippingProvince
    {
        return app(FindShippingProvinceByIdTask::class)->run($id);
    }
}
