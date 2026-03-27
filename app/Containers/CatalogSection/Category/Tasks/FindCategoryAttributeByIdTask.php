<?php

namespace App\Containers\CatalogSection\Category\Tasks;

use App\Containers\CatalogSection\Category\Models\CategoryAttribute;
use App\Ship\Parents\Tasks\Task;

class FindCategoryAttributeByIdTask extends Task
{
    public function run($id): ?CategoryAttribute
    {
        return CategoryAttribute::find($id);
    }
}
