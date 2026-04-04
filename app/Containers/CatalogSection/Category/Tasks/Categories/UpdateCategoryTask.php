<?php

namespace App\Containers\CatalogSection\Category\Tasks\Categories;

use App\Containers\CatalogSection\Category\Models\Category;
use App\Ship\Parents\Tasks\Task;

class UpdateCategoryTask extends Task
{
    public function run($id, array $data)
    {
        $category = Category::findOrFail($id);
        $category->update($data);

        return $category;
    }
}
