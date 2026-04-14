<?php

namespace App\Containers\OrderSection\Shipping\Actions\ShippingRate;

use App\Containers\OrderSection\Shipping\Tasks\ShippingRate\FindShippingRateByIdTask;
use App\Ship\Parents\Actions\Action;

class FindShippingRateByIdAction extends Action
{
    public function __construct(private FindShippingRateByIdTask $task) {}

    public function run(int $id)
    {
        return $this->task->run($id);
    }
}
