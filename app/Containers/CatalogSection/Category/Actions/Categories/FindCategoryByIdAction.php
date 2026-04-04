<?php

namespace App\Containers\CatalogSection\Category\Actions\Categories;

use App\Containers\CatalogSection\Category\Tasks\Categories\FindCategoryByIdTask;
use App\Ship\Parents\Actions\Action;

class FindCategoryByIdAction extends Action
{
    public function __construct(private FindCategoryByIdTask $task) {}

    public function run($id)
    {
        return $this->task->run($id);
    }
}
