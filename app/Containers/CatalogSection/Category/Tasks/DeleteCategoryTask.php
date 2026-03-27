<?php

namespace App\Containers\CatalogSection\Category\Tasks;

use App\Containers\CatalogSection\Category\Models\Category;
use App\Ship\Parents\Tasks\Task;

class DeleteCategoryTask extends Task
{
    public function run(Category $category): bool
    {
        return $category->delete();
    }
}
