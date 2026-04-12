<?php

namespace App\Containers\CatalogSection\Product\Tasks\Products;

use App\Containers\CatalogSection\Product\Models\ProductItem;
use App\Ship\Parents\Tasks\Task;

class GetAllByCateTask extends Task
{
    public function run($cate_id, $numberOfProducts = null)
    {
        $query = ProductItem::whereHas('product', function ($q) use ($cate_id) {
            $q->where('category_id', $cate_id);
        })->with([
            'product',
            'product.category',
            'product.brand',
            'variants',
        ]);

        if ($numberOfProducts) {
            $query->take($numberOfProducts);
        }

        return $query->latest()->get();
    }
}
