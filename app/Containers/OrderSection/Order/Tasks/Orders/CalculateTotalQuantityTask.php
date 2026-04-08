<?php

namespace App\Containers\OrderSection\Order\Tasks\Orders;

use App\Ship\Parents\Tasks\Task;

class CalculateTotalQuantityTask extends Task
{
    public function run($items)
    {
        return collect($items)->sum('quantity');
    }
}
