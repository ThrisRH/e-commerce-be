<?php

namespace App\Containers\OrderSection\Shipping\Actions\Route;

use App\Containers\OrderSection\Shipping\Tasks\Route\GetAllShippingRoutesTask;
use App\Ship\Parents\Actions\Action;

class GetAllShippingRoutesAction extends Action
{
    public function run()
    {
        return app(GetAllShippingRoutesTask::class)->run();
    }
}
