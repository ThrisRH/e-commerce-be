<?php

namespace App\Containers\CatalogSection\Product\Tasks\ProductAttributes;

use App\Containers\CatalogSection\Product\Models\Product;

class UpdateProductTask
{
    public function run(Product $product, array $data)
    {
        $changed = array_filter($data, fn ($value, $key) => isset($product, $key) && $value !== $product->$key, ARRAY_FILTER_USE_BOTH);

        if (! empty($changed)) {
            $product->update($changed);
        }

        return $product;
    }
}
