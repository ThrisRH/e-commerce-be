<?php

namespace App\Containers\OrderSection\Shipping\Actions\Province;

use App\Containers\OrderSection\Shipping\Tasks\Province\DeleteShippingProvinceTask;
use App\Ship\Parents\Actions\Action;

class DeleteShippingProvinceAction extends Action
{
    public function run($id): bool
    {
        return app(DeleteShippingProvinceTask::class)->run($id);
    }
}
