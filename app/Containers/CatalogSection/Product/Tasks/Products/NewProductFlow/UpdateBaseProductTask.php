<?php

namespace App\Containers\CatalogSection\Product\Tasks\Products\NewProductFlow;

use App\Containers\CatalogSection\Product\Models\Product;
use App\Ship\Parents\Tasks\Task;

class UpdateBaseProductTask extends Task
{
    public function run(Product $product, array $data): Product
    {
        $product->update(array_filter([
            'name' => $data['name'] ?? $product->name,
            'description' => $data['description'] ?? $product->description,
            'image_url' => $data['image_url'] ?? $product->image_url,
            'brand_id' => $data['brand_id'] ?? $product->brand_id,
            'category_id' => $data['category_id'] ?? $product->category_id,
        ]));

        return $product;
    }
}
