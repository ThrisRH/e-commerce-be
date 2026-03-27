<?php

namespace App\Containers\CatalogSection\Category\Tasks;

use App\Containers\CatalogSection\Category\Models\CategoryAttribute;
use App\Ship\Parents\Tasks\Task;

class CreateCategoryAttributeTask extends Task
{
    public function run(array $data): CategoryAttribute
    {
        return CategoryAttribute::create($data);
    }
}
