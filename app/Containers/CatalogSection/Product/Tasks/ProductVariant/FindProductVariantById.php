<?php

namespace App\Containers\CatalogSection\Product\Tasks\ProductVariant;

use App\Containers\CatalogSection\Product\Models\ProductVariant;
use App\Ship\Parents\Tasks\Task;

class FindProductVariantById extends Task
{
    public function run($id)
    {
        $productVariant = ProductVariant::findOrFail($id);

        return $productVariant;
    }
}
