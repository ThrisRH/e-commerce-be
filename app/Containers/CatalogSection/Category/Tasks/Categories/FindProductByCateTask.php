<?php

namespace App\Containers\CatalogSection\Category\Tasks\Categories;

use App\Containers\CatalogSection\Product\Models\Product;
use App\Ship\Parents\Tasks\Task;

class FindProductByCateTask extends Task
{
    public function run($id, $limit)
    {
        return Product::where('category_id', $id)->paginate($limit);
    }
}
