<?php

namespace App\Containers\CatalogSection\Category\Actions\CategoryAttributes;

use App\Containers\CatalogSection\Category\Models\CategoryAttribute;
use App\Containers\CatalogSection\Category\Tasks\CategoryAttributes\UpdateCategoryAttributeTask;
use App\Ship\Parents\Actions\Action;

class UpdateCategoryAttributeAction extends Action
{
    public function __construct(private UpdateCategoryAttributeTask $task) {}

    public function run($id, array $data): CategoryAttribute
    {
        return $this->task->run($id, $data);
    }
}
