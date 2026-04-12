<?php

namespace App\Containers\CatalogSection\Product\Tasks\Products;

use App\Containers\CatalogSection\Product\Models\ProductVariant;
use App\Ship\Parents\Tasks\Task;

class FindProductVariantByIdTask extends Task
{
    public function run($id): ProductVariant
    {
        return ProductVariant::findOrFail($id);
    }
}
