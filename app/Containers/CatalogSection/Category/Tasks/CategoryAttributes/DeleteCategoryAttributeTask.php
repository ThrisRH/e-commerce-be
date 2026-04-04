<?php

namespace App\Containers\CatalogSection\Category\Tasks\CategoryAttributes;

use App\Containers\CatalogSection\Category\Models\CategoryAttribute;
use App\Ship\Parents\Tasks\Task;

class DeleteCategoryAttributeTask extends Task
{
    public function run($id)
    {
        return CategoryAttribute::destroy($id);
    }
}
