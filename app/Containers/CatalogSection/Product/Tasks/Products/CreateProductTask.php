<?php

namespace App\Containers\CatalogSection\Product\Tasks\Products;

use App\Containers\CatalogSection\Product\Models\Product;
use App\Ship\Parents\Tasks\Task;

class CreateProductTask extends Task
{
    public function run(array $data)
    {
        return Product::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'image_url' => $data['image_url'],
            'stock' => $data['stock'],
            'price' => $data['price'],
            'brand_id' => $data['brand_id'],
            'category_id' => $data['category_id'],
        ]);
    }
}
