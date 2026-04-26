<?php

namespace App\Containers\CatalogSection\Product\Tasks\Products\NewProductFlow;

use App\Containers\CatalogSection\Product\Models\ProductVariant;
use App\Ship\Parents\Tasks\Task;

class UpdateProductVariantTask extends Task
{
    public function run(ProductVariant $productVariant, array $data): ProductVariant
    {
        $productVariant->update(array_filter([
            'product_item_id' => $data['product_item_id'] ?? $productVariant->product_item_id,
            'sku' => $data['sku'] ?? $productVariant->sku,
            'image_url' => $data['image_url'] ?? $productVariant->image_url,
            'price' => $data['price'] ?? $productVariant->price,
            'stock' => $data['stock'] ?? $productVariant->stock,
            'is_default' => $data['is_default'] ?? $productVariant->is_default,
            'weight' => $data['weight'] ?? $productVariant->weight,
            'length' => $data['length'] ?? $productVariant->length,
            'width' => $data['width'] ?? $productVariant->width,
            'height' => $data['height'] ?? $productVariant->height,
        ]));

        return $productVariant;
    }
}
