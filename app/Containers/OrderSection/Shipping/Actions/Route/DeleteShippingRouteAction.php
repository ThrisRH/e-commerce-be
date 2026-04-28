<?php

namespace App\Containers\OrderSection\Shipping\Actions\Route;

use App\Containers\OrderSection\Shipping\Tasks\Route\DeleteShippingRouteTask;
use App\Ship\Parents\Actions\Action;

class DeleteShippingRouteAction extends Action
{
    public function run($id): bool
    {
        return app(DeleteShippingRouteTask::class)->run($id);
    }
}
