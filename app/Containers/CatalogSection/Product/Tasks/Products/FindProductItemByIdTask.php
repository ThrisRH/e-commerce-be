<?php

namespace App\Containers\CatalogSection\Product\Tasks\Products;

use App\Containers\CatalogSection\Product\Models\ProductItem;
use App\Ship\Parents\Tasks\Task;

class FindProductItemByIdTask extends Task
{
    public function run($id): ProductItem
    {
        return ProductItem::findOrFail($id);
    }
}
