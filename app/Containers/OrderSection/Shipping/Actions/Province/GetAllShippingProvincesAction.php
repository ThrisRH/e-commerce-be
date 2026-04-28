<?php

namespace App\Containers\OrderSection\Shipping\Actions\Province;

use App\Containers\OrderSection\Shipping\Tasks\Province\GetAllShippingProvincesTask;
use App\Ship\Parents\Actions\Action;

class GetAllShippingProvincesAction extends Action
{
    public function run()
    {
        return app(GetAllShippingProvincesTask::class)->run();
    }
}
