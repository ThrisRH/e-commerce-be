<?php

namespace App\Containers\CatalogSection\Product\Tasks\Products;

use App\Containers\CatalogSection\Product\Models\Product;
use App\Ship\Parents\Tasks\Task;

class DeleteProductTask extends Task
{
    public function run($id)
    {
        $product = Product::findOrFail($id);

        return $product->delete();
    }
}
