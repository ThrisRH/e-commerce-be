<?php

namespace App\Containers\CatalogSection\Product\Tasks;

use App\Containers\CatalogSection\Product\Models\Product;

class ResetProductAttributesTask
{
    public function run(Product $product)
    {
        $product->productAttributes()->delete();
    }
}
