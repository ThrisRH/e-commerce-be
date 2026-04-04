<?php

namespace App\Containers\CatalogSection\Category\Actions\Categories;

use App\Containers\CatalogSection\Category\Models\Category;
use App\Containers\CatalogSection\Category\Tasks\Categories\UpdateCategoryTask;
use App\Ship\Parents\Actions\Action;

class UpdateCategoryAction extends Action
{
    public function __construct(private UpdateCategoryTask $task) {}

    public function run($id, array $data): Category
    {
        return $this->task->run($id, $data);
    }
}
