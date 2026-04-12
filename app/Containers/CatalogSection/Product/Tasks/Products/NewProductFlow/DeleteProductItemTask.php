<?php

namespace App\Containers\CatalogSection\Product\Tasks\Products\NewProductFlow;

use App\Containers\CatalogSection\Product\Models\ProductItem;
use App\Ship\Parents\Tasks\Task;

class DeleteProductItemTask extends Task
{
    public function run(int|ProductItem $item): bool
    {
        if (is_int($item)) {
            $item = ProductItem::findOrFail($item);
        }

        return $item->delete();
    }
}
