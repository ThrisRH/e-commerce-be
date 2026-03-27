<?php

namespace App\Containers\CatalogSection\Category\Tasks;

use App\Containers\CatalogSection\Category\Models\CategoryAttribute;
use App\Ship\Parents\Tasks\Task;

class UpdateCategoryAttributeTask extends Task
{
    public function run(CategoryAttribute $model, array $data): CategoryAttribute
    {
        $model->update($data);

        return $model;
    }
}
