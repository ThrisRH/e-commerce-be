<?php

namespace App\Containers\OrderSection\Order\Tasks\Orders;

use App\Containers\OrderSection\Order\Models\Order;
use App\Ship\Parents\Tasks\Task;

class GetAllOrderTask extends Task
{
    public function run()
    {
        return Order::all();
    }
}
