<?php

namespace App\Containers\OrderSection\Order\Actions\Orders;

use App\Containers\OrderSection\Order\Tasks\Orders\CalculateShippingFeeTask;
use App\Ship\Parents\Actions\Action;

class CalculateShippingFeeAction extends Action
{
    public function __construct(
        protected CalculateShippingFeeTask $calculateShippingFeeTask
    ) {}

    public function run(array $data): int
    {
        $distance = (int) ($data['distance'] ?? 0);
        $totalQuantity = (int) ($data['total_quantity'] ?? 1);

        return $this->calculateShippingFeeTask->run($distance, $totalQuantity);
    }
}
