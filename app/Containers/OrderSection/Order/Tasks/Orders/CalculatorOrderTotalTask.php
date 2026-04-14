<?php

namespace App\Containers\OrderSection\Order\Tasks\Orders;

use App\Containers\CatalogSection\Product\Models\ProductVariant;
use App\Ship\Parents\Tasks\Task;

class CalculatorOrderTotalTask extends Task
{
    public function run(array $items)
    {
        $total = 0;

        foreach ($items as $item) {
            $variant = ProductVariant::where('sku', $item['sku'])
                ->whereHas('productItem', function ($query) use ($item) {
                    $query->where('slug', $item['slug']);
                })->first();

            if ($variant) {
                $total += $variant->price * $item['quantity'];
            }
        }

        return $total;
    }
}
