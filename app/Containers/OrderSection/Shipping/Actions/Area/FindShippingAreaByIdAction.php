<?php

namespace App\Containers\OrderSection\Shipping\Actions\Area;

use App\Containers\OrderSection\Shipping\Models\ShippingArea;
use App\Containers\OrderSection\Shipping\Tasks\Area\FindShippingAreaByIdTask;
use App\Ship\Parents\Actions\Action;

class FindShippingAreaByIdAction extends Action
{
    public function run($id): ShippingArea
    {
        return app(FindShippingAreaByIdTask::class)->run($id);
    }
}
