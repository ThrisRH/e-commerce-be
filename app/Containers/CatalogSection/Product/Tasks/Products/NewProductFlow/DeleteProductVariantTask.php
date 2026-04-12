<?php

namespace App\Containers\CatalogSection\Product\Tasks\Products\NewProductFlow;

use App\Containers\CatalogSection\Product\Models\ProductVariant;
use App\Ship\Parents\Tasks\Task;

class DeleteProductVariantTask extends Task
{
    public function run(int|ProductVariant $variant): bool
    {
        if (is_int($variant)) {
            $variant = ProductVariant::findOrFail($variant);
        }

        return $variant->delete();
    }
}
