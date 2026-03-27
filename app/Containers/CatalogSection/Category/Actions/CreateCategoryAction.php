<?php

namespace App\Containers\CatalogSection\Category\Actions;

use App\Containers\CatalogSection\Category\Models\Category;
use App\Containers\CatalogSection\Category\Tasks\CreateCategoryTask;
use App\Ship\Parents\Actions\Action;

class CreateCategoryAction extends Action
{
    public function __construct(private CreateCategoryTask $task) {}

    public function run(array $data): Category
    {
        return $this->task->run($data);
    }
}
