<?php

namespace App\Containers\CatalogSection\Category\Tasks;

use App\Containers\CatalogSection\Category\Models\Category;
use App\Ship\Parents\Tasks\Task;

class UpdateCategoryTask extends Task
{
    public function run(Category $category, array $data): Category
    {
        $category->update($data);

        return $category;
    }
}
