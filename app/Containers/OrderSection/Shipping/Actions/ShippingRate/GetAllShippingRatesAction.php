<?php

namespace App\Containers\OrderSection\Shipping\Actions\ShippingRate;

use App\Containers\OrderSection\Shipping\Tasks\ShippingRate\GetAllShippingRatesTask;
use App\Ship\Parents\Actions\Action;

class GetAllShippingRatesAction extends Action
{
    public function __construct(private GetAllShippingRatesTask $task) {}

    public function run()
    {
        return $this->task->run();
    }
}
