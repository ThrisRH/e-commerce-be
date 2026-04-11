<?php

namespace App\Containers\CatalogSection\Product\Tasks\Products\NewProductFlow;

use App\Containers\CatalogSection\Product\Models\Product;
use App\Ship\Parents\Tasks\Task;

class CreateBaseProductTask extends Task
{
    public function run(array $data)
    {
        $product = Product::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'image_url' => $data['image_url'],
            'brand_id' => $data['brand_id'],
            'category_id' => $data['category_id'],
        ]);

        return $product;
    }
}
