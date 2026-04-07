<?php

namespace App\Containers\OrderSection\Order\Tasks\OrderItems;

use App\Containers\OrderSection\Order\Models\OrderItem;
use App\Ship\Parents\Tasks\Task;

class GetOrderItemsTask extends Task
{
    public function run()
    {
        return OrderItem::all();
    }
}
