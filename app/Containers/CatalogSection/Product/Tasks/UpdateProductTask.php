<?php

namespace App\Containers\CatalogSection\Product\Tasks;

use App\Containers\AppSection\Product\Models\Product;

class UpdateProductTask
{
    public function run(Product $product, array $data)
    {
        $product->update(array_filter([
            'name' => $data['name'] ?? null,
            'description' => $data['description'] ?? null,
            'image_url' => $data['image_url'] ?? null,
            'stock' => $data['stock'] ?? null,
            'price' => $data['price'] ?? null,
            'brand_id' => $data['brand_id'] ?? null,
            'category_id' => $data['category_id'] ?? null,
        ], fn ($v) => ! is_null($v))
        );
    }
}
