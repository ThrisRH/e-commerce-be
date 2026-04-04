<?php

namespace App\Containers\CatalogSection\Category\Tasks\CategoryAttributes;

use App\Containers\CatalogSection\Category\Models\CategoryAttribute;
use App\Ship\Parents\Tasks\Task;

class CreateCategoryAttributeTask extends Task
{
    public function run(array $data)
    {
        return CategoryAttribute::create($data);
    }
}
