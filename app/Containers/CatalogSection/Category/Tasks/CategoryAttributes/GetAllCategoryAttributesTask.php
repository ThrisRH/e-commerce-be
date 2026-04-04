<?php

namespace App\Containers\CatalogSection\Category\Tasks\CategoryAttributes;

use App\Containers\CatalogSection\Category\Models\CategoryAttribute;
use App\Ship\Parents\Tasks\Task;

class GetAllCategoryAttributesTask extends Task
{
    public function run()
    {
        return CategoryAttribute::all();
    }
}
