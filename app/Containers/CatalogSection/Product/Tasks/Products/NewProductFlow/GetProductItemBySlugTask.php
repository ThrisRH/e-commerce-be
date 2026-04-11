<?php

namespace App\Containers\CatalogSection\Product\Tasks\Products\NewProductFlow;

use App\Containers\CatalogSection\Product\Models\ProductItem;
use App\Ship\Parents\Tasks\Task;

class GetProductItemBySlugTask extends Task
{
    public function run($slug)
    {
        return ProductItem::with(
            'product',
            'product.brand',
            'product.category',
            'product.productSpecifications',
            'variants',
            'variants.variantValues',
            'variants.variantValues.attributeValue'
        )
            ->where('slug', $slug)
            ->first();
    }
}
