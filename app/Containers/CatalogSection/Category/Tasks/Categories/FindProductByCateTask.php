<?php

namespace App\Containers\CatalogSection\Category\Tasks\Categories;

use App\Containers\CatalogSection\Product\Models\ProductItem;
use App\Ship\Parents\Tasks\Task;

class FindProductByCateTask extends Task
{
    public function run($id, $limit)
    {
        return ProductItem::whereHas('product', function ($query) use ($id) {
            $query->where('category_id', $id);
        })->paginate($limit);
    }
}
