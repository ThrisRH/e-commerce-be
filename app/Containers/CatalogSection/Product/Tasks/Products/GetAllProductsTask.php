<?php

namespace App\Containers\CatalogSection\Product\Tasks\Products;

use App\Containers\CatalogSection\Product\Models\ProductItem;
use App\Ship\Parents\Tasks\Task;

class GetAllProductsTask extends Task
{
    public function run(int $limit)
    {
        return ProductItem::with([
            'product',
            'product.category',
            'product.brand',
            'variants',
        ])
            ->latest()
            ->paginate($limit);
    }
}
