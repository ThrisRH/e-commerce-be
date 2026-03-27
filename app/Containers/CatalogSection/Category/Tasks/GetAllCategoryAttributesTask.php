<?php

namespace App\Containers\CatalogSection\Category\Tasks;

use App\Containers\CatalogSection\Category\Models\CategoryAttribute;
use App\Ship\Parents\Tasks\Task;

class GetAllCategoryAttributesTask extends Task
{
    public function run()
    {
        return CategoryAttribute::latest()->paginate(10);
    }
}
