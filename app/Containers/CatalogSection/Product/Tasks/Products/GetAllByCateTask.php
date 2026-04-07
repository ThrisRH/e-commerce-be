<?php

namespace App\Containers\CatalogSection\Product\Tasks\Products;

use App\Containers\CatalogSection\Product\Models\Product;
use App\Ship\Parents\Tasks\Task;

class GetAllByCateTask extends Task
{
    public function run($cate_id, $numberOfProducts = null)
    {
        $query = Product::where('category_id', $cate_id);

        if ($numberOfProducts) {
            $query->take($numberOfProducts);
        }

        return $query->latest()->get();
    }
}
