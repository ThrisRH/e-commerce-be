<?php

namespace App\Containers\OrderSection\Shipping\Actions\Area;

use App\Containers\OrderSection\Shipping\Tasks\Area\DeleteShippingAreaTask;
use App\Ship\Parents\Actions\Action;

class DeleteShippingAreaAction extends Action
{
    public function run($id): bool
    {
        return app(DeleteShippingAreaTask::class)->run($id);
    }
}
