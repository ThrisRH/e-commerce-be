<?php

namespace App\Actions\Product;

use App\Models\Product;

class UpdateProduct
{
    public function handle(Product $product, array $data)
    {
        $oldCategory = $product->category_id;

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

        if (isset($data['category_id']) && $oldCategory != $data['category_id']) {
            app(ResetProductAttributes::class)->handle($product);
        }
    }
}
