<?php

namespace App\Containers\CatalogSection\Category\Tasks;

use App\Containers\CatalogSection\Category\Models\Category;
use App\Ship\Parents\Tasks\Task;

class CreateCategoryTask extends Task
{
    public function run(array $data): Category
    {
        return Category::create($data);
    }
}
