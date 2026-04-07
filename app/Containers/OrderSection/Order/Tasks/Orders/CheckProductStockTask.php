<?php

namespace App\Containers\OrderSection\Order\Tasks\Orders;

use App\Ship\Parents\Tasks\Task;

class CheckProductStockTask extends Task
{
    public function run($product, $quantity)
    {
        if ($product->stock < $quantity) {
            throw new \Exception('Product stock is not enough');
        }
    }
}
