<?php

namespace App\Containers\OrderSection\Order\Tasks\Orders;

use App\Ship\Parents\Tasks\Task;

class CalculateShippingFeeTask extends Task
{
    public function run(int $totalQuantity, int $totalPrice): int
    {
        $baseFee = config('shipping.base_fee');
        $feePerItem = config('shipping.fee_per_item');
        $maxFee = config('shipping.max_fee');

        if ($totalPrice >= 4000000) {
            return 0;
        }
        $itemFee = min($totalQuantity * $feePerItem, 50000);

        $totalFee = $baseFee + $itemFee;

        return min($totalFee, $maxFee);
    }
}
