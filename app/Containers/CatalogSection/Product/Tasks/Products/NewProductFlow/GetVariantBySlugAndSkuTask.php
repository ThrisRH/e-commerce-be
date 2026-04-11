<?php

namespace App\Containers\CatalogSection\Product\Tasks\Products\NewProductFlow;

use App\Containers\CatalogSection\Product\Models\ProductVariant;
use App\Ship\Parents\Tasks\Task;

class GetVariantBySlugAndSkuTask extends Task
{
    public function run($slug, $sku)
    {
        return ProductVariant::with('productItem', 'productItem.product', 'variantValues', 'variantValues.attributeValue')
            ->where('sku', $sku)
            ->whereHas('productItem', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })
            ->first();
    }
}
