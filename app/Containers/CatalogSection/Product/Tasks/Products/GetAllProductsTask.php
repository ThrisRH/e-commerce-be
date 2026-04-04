<?php

namespace App\Containers\CatalogSection\Product\Tasks\Products;

use App\Containers\CatalogSection\Product\Models\Product;
use App\Ship\Parents\Tasks\Task;

class GetAllProductsTask extends Task
{
    public function run(int $limit)
    {
        return Product::with(['productAttributes.attribute', 'category', 'brand'])
            ->latest()
            ->paginate($limit);
    }
}
