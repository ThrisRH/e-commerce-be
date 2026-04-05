<?php

namespace App\Containers\CatalogSection\Product\Tasks\Products;

use App\Containers\CatalogSection\Product\Models\Product;
use App\Ship\Parents\Tasks\Task;

class FindProductsByKeywordTask extends Task
{
    public function run(string $keyword, int $limit = 10)
    {
        return Product::with(['productAttributes.attribute', 'category', 'brand'])
            ->where('name', 'LIKE', "%$keyword%")
            ->orWhere('description', 'LIKE', "%$keyword%")
            ->latest()
            ->paginate($limit);
    }
}
