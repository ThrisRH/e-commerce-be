<?php

namespace App\Containers\CatalogSection\Product\Tasks\Products;

use App\Containers\CatalogSection\Product\Models\ProductVariant;
use App\Ship\Parents\Tasks\Task;

class FindProductVariantBySkuAndSlugTask extends Task
{
    public function run(string $sku, string $slug): ?ProductVariant
    {
        return ProductVariant::where('sku', $sku)
            ->whereHas('productItem', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })
            ->first();
    }
}
