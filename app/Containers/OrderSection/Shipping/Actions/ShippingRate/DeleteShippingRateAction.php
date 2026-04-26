<?php

namespace App\Containers\OrderSection\Shipping\Actions\ShippingRate;

use App\Containers\OrderSection\Shipping\Tasks\ShippingRate\DeleteShippingRateTask;
use App\Containers\OrderSection\Shipping\Tasks\ShippingRate\FindShippingRateByIdTask;
use App\Ship\Parents\Actions\Action;

class DeleteShippingRateAction extends Action
{
    public function __construct(
        private DeleteShippingRateTask $task,
        private FindShippingRateByIdTask $findTask
    ) {}

    public function run(int $id)
    {
        $shippingRate = $this->findTask->run($id);

        if (!$shippingRate) {
            throw new \Exception('Shipping rate not found');
        }

        return $this->task->run($shippingRate);
    }
}
