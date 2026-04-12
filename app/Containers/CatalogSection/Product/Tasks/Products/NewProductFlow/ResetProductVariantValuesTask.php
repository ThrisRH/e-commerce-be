<?php

namespace App\Containers\CatalogSection\Product\Tasks\Products\NewProductFlow;

use App\Containers\CatalogSection\Product\Models\ProductVariant;
use App\Ship\Parents\Tasks\Task;

class ResetProductVariantValuesTask extends Task
{
    public function run(ProductVariant $variant): void
    {
        $variant->variantValues()->delete();
    }
}
