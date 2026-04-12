<?php

namespace App\Containers\CatalogSection\Product\Tasks\Products;

use App\Containers\CatalogSection\Product\Models\Product;
use App\Ship\Parents\Tasks\Task;

class FindProductByIdTask extends Task
{
    public function run($id)
    {
        $product = Product::with(['category', 'brand', 'productItems.variants.variantValues'])
            ->findOrFail($id);

        return $product;
    }
}
