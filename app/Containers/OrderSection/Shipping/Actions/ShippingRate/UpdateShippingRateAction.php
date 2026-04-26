<?php

namespace App\Containers\OrderSection\Shipping\Actions\ShippingRate;

use App\Containers\OrderSection\Shipping\Tasks\ShippingRate\FindShippingRateByIdTask;
use App\Containers\OrderSection\Shipping\Tasks\ShippingRate\UpdateShippingRateTask;
use App\Ship\Parents\Actions\Action;

class UpdateShippingRateAction extends Action
{
    public function __construct(
        private UpdateShippingRateTask $task,
        private FindShippingRateByIdTask $findTask
    ) {}

    public function run(int $id, array $data)
    {
        $shippingRate = $this->findTask->run($id);

        return $this->task->run($shippingRate, $data);
    }
}
