<?php

namespace App\Containers\OrderSection\Shipping\Actions\ShippingRate;

use App\Containers\OrderSection\Shipping\Models\ShippingRate;
use App\Containers\OrderSection\Shipping\Tasks\ShippingRate\UpdateShippingRateTask;
use App\Ship\Parents\Actions\Action;

class UpdateShippingRateAction extends Action
{
    public function __construct(private UpdateShippingRateTask $task) {}

    public function run(ShippingRate $shippingRate, array $data)
    {
        return $this->task->run($shippingRate, $data);
    }
}
