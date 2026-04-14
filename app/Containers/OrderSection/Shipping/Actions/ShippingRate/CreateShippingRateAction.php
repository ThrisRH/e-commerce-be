<?php

namespace App\Containers\OrderSection\Shipping\Actions\ShippingRate;

use App\Containers\OrderSection\Shipping\Tasks\ShippingRate\CreateShippingRateTask;
use App\Ship\Parents\Actions\Action;

class CreateShippingRateAction extends Action
{
    public function __construct(private CreateShippingRateTask $task) {}

    public function run(array $data)
    {
        return $this->task->run($data);
    }
}
