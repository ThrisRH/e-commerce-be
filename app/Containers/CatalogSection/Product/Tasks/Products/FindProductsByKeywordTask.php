<?php

namespace App\Containers\CatalogSection\Product\Tasks\Products;

use App\Containers\CatalogSection\Product\Models\ProductItem;
use App\Ship\Parents\Tasks\Task;

class FindProductsByKeywordTask extends Task
{
    public function run(string $keyword, int $limit = 10)
    {
        return ProductItem::where('name', 'LIKE', "%$keyword%")
            ->with([
                'product',
                'product.category',
                'product.brand',
                'variants',
            ])
            ->latest()
            ->paginate($limit);
    }
}
