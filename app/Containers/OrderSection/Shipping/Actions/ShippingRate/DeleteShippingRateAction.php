<?php

namespace App\Containers\OrderSection\Shipping\Actions\ShippingRate;

use App\Containers\OrderSection\Shipping\Models\ShippingRate;
use App\Containers\OrderSection\Shipping\Tasks\ShippingRate\DeleteShippingRateTask;
use App\Ship\Parents\Actions\Action;

class DeleteShippingRateAction extends Action
{
    public function __construct(private DeleteShippingRateTask $task) {}

    public function run(ShippingRate $shippingRate)
    {
        return $this->task->run($shippingRate);
    }
}
