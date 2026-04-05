<?php

namespace App\Containers\OrderSection\Order\Tasks\Orders;

use App\Containers\OrderSection\Order\Models\Order;
use App\Ship\Parents\Tasks\Task;

class UpdateOrderTask extends Task
{
    public function run(Order $order, array $data): Order
    {
        $order->update($data);
        return $order;
    }
}
