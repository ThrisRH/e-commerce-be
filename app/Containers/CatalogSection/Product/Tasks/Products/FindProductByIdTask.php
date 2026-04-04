<?php

namespace App\Containers\CatalogSection\Product\Tasks\Products;

use App\Containers\CatalogSection\Product\Models\Product;
use App\Ship\Parents\Tasks\Task;

class FindProductByIdTask extends Task
{
    public function run($id)
    {
        return Product::with(['productAttributes.attribute', 'category', 'brand'])
            ->findOrFail($id);
    }
}
