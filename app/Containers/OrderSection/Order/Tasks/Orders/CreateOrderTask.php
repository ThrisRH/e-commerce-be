<?php

namespace App\Containers\OrderSection\Order\Tasks\Orders;

use App\Containers\OrderSection\Order\Models\Order;
use App\Ship\Parents\Tasks\Task;

class CreateOrderTask extends Task
{
    public function run(array $data)
    {
        $data['shipping_address'] = $data['to']['ward'].', '.$data['to']['district'].', '.$data['to']['province'];

        return Order::create($data);
    }
}
