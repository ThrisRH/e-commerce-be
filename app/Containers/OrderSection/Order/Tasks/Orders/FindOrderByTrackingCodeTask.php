<?php

namespace App\Containers\OrderSection\Order\Tasks\Orders;

use App\Containers\OrderSection\Order\Models\Order;
use App\Ship\Parents\Tasks\Task;

class FindOrderByTrackingCodeTask extends Task
{
    public function run(string $trackingCode)
    {
        return Order::where('tracking_code', $trackingCode)->first();
    }
}
