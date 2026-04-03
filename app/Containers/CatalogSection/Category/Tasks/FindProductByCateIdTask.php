<?php

namespace App\Containers\CatalogSection\Category\Tasks;

use App\Containers\CatalogSection\Product\Models\Product;
use App\Ship\Parents\Tasks\Task;

class FindProductByCateIdTask extends Task
{
    public function run($id)
    {
        return Product::where('category_id', $id)->latest()->paginate(10);
    }
}
