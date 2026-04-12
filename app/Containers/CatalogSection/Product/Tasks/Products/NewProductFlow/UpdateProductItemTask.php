<?php

namespace App\Containers\CatalogSection\Product\Tasks\Products\NewProductFlow;

use App\Containers\CatalogSection\Product\Models\ProductItem;
use App\Ship\Parents\Tasks\Task;

class UpdateProductItemTask extends Task
{
    public function run(ProductItem $productItem, array $data): ProductItem
    {
        $productItem->update(array_filter([
            'name' => $data['name'] ?? $productItem->name,
            'product_id' => $data['product_id'] ?? $productItem->product_id,
        ]));

        return $productItem;
    }
}
