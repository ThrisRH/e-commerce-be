<?php

namespace App\Containers\OrderSection\Shipping\Actions\Area;

use App\Containers\OrderSection\Shipping\Models\ShippingArea;
use App\Containers\OrderSection\Shipping\Tasks\Area\UpdateShippingAreaTask;
use App\Ship\Parents\Actions\Action;

class UpdateShippingAreaAction extends Action
{
    public function run($id, array $data): ShippingArea
    {
        return app(UpdateShippingAreaTask::class)->run($id, $data);
    }
}
