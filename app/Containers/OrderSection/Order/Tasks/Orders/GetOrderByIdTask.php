<?php

namespace App\Containers\OrderSection\Order\Tasks\Orders;

use App\Containers\OrderSection\Order\Models\Order;
use App\Ship\Parents\Tasks\Task;

class GetOrderByIdTask extends Task
{
    public function run(int $id): Order
    {
        return Order::findOrFail($id);
    }
}
