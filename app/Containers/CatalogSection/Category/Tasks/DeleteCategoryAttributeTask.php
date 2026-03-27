<?php

namespace App\Containers\CatalogSection\Category\Tasks;

use App\Containers\CatalogSection\Category\Models\CategoryAttribute;
use App\Ship\Parents\Tasks\Task;

class DeleteCategoryAttributeTask extends Task
{
    public function run(CategoryAttribute $model): bool
    {
        return $model->delete();
    }
}
