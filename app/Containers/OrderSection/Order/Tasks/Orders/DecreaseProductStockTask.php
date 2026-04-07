<?php

namespace App\Containers\OrderSection\Order\Tasks\Orders;

use App\Ship\Parents\Tasks\Task;

class DecreaseProductStockTask extends Task
{
    public function run($product, $quantity)
    {
        $product->decrement('stock', $quantity);
    }
}
