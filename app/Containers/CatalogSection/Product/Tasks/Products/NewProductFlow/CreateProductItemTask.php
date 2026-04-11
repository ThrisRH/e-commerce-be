<?php

namespace App\Containers\CatalogSection\Product\Tasks\Products\NewProductFlow;

use App\Containers\CatalogSection\Product\Models\ProductItem;
use App\Ship\Parents\Tasks\Task;

class CreateProductItemTask extends Task
{
    public function run(array $data)
    {
        $productItem = ProductItem::create([
            'product_id' => $data['base_product_id'],
            'name' => $data['name'],
        ]);

        return $productItem;
    }
}
