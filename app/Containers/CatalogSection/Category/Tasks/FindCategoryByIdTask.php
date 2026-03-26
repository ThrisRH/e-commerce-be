<?php

namespace App\Containers\CatalogSection\Category\Tasks;

use App\Containers\CatalogSection\Category\Models\Category;
use App\Ship\Parents\Tasks\Task;

class FindCategoryByIdTask extends Task
{
    public function run($id)
    {
        return Category::with('categoryAttributes.attribute')->findOrFail($id);
    }
}
