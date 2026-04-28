<?php

namespace App\Containers\OrderSection\Shipping\Actions\Area;

use App\Containers\OrderSection\Shipping\Models\ShippingArea;
use App\Containers\OrderSection\Shipping\Tasks\Area\CreateShippingAreaTask;
use App\Ship\Parents\Actions\Action;

class CreateShippingAreaAction extends Action
{
    public function run(array $data): ShippingArea
    {
        return app(CreateShippingAreaTask::class)->run($data);
    }
}
