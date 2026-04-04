<?php

namespace App\Containers\CatalogSection\Category\Tasks\Categories;

use App\Containers\CatalogSection\Category\Models\Category;
use App\Ship\Parents\Tasks\Task;

class CreateCategoryTask extends Task
{
    public function run(array $data)
    {
        return Category::create($data);
    }
}
