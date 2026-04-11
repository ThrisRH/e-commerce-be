<?php

namespace App\Containers\CatalogSection\Product\Tasks\Products\NewProductFlow;

use App\Containers\CatalogSection\Product\Models\ProductVariant;
use App\Ship\Parents\Tasks\Task;

class CreateProductVariantTask extends Task
{
    public function run(array $data)
    {
        $hasDefault = ProductVariant::where('product_item_id', $data['product_item_id'])
            ->where('is_default', 1)
            ->exists();

        $data['is_default'] = ! $hasDefault;

        $variant = ProductVariant::create($data);

        return $variant;
    }
}
