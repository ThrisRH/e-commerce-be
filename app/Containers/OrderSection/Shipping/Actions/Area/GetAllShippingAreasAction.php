<?php

namespace App\Containers\OrderSection\Shipping\Actions\Area;

use App\Containers\OrderSection\Shipping\Tasks\Area\GetAllShippingAreasTask;
use App\Ship\Parents\Actions\Action;

class GetAllShippingAreasAction extends Action
{
    public function run()
    {
        return app(GetAllShippingAreasTask::class)->run();
    }
}
