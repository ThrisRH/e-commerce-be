<?php

namespace App\Containers\OrderSection\Order\Tasks\Orders;

use App\Containers\CatalogSection\Product\Models\Product;
use App\Ship\Parents\Tasks\Task;

class CalculatorOrderTotalTask extends Task
{
    public function run(array $items)
    {
        $product_ids = collect($items)->pluck('product_id');

        $products = Product::whereIn('id', $product_ids)->get()->keyBy('id');

        $total = 0;

        foreach ($items as $item) {
            $product = $products[$item['product_id']];
            $total += $product->price * $item['quantity'];
        }

        return $total;
    }
}
