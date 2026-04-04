<?php

namespace App\Containers\CatalogSection\Category\Tasks\CategoryAttributes;

use App\Containers\CatalogSection\Category\Models\CategoryAttribute;
use App\Ship\Parents\Tasks\Task;

class UpdateCategoryAttributeTask extends Task
{
    public function run($id, array $data)
    {
        $categoryAttribute = CategoryAttribute::findOrFail($id);
        $categoryAttribute->update($data);

        return $categoryAttribute;
    }
}
