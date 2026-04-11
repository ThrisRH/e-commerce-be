<?php

namespace App\Containers\CatalogSection\Product\Tasks\ProductVariant;

use App\Containers\CatalogSection\Product\Models\ProductVariant;
use App\Ship\Parents\Tasks\Task;

class DeleteProductVariantTask extends Task
{
    public function run(ProductVariant $variant)
    {
        return $variant->delete();
    }
}
