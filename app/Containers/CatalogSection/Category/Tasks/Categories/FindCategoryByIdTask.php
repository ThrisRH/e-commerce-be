<?php

namespace App\Containers\CatalogSection\Category\Tasks\Categories;

use App\Containers\CatalogSection\Category\Models\Category;
use App\Ship\Parents\Tasks\Task;

class FindCategoryByIdTask extends Task
{
    public function run($id)
    {
        return Category::findOrFail($id);
    }
}
