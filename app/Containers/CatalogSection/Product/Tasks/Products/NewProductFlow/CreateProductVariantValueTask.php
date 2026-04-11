<?php

namespace App\Containers\CatalogSection\Product\Tasks\Products\NewProductFlow;

use App\Containers\CatalogSection\Product\Models\ProductVariantAttributeValue;
use App\Ship\Parents\Tasks\Task;

class CreateProductVariantValueTask extends Task
{
    public function run(array $data)
    {
        $productVariantValue = ProductVariantAttributeValue::create([
            'product_variant_id' => $data['product_variant_id'],
            'attribute_value_id' => $data['attribute_value_id'],
        ]);

        return $productVariantValue;
    }
}
