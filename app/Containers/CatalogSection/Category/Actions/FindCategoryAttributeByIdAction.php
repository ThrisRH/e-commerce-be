<?php

namespace App\Containers\CatalogSection\Category\Actions;

use App\Containers\CatalogSection\Category\Tasks\FindCategoryAttributeByIdTask;
use App\Ship\Parents\Actions\Action;

class FindCategoryAttributeByIdAction extends Action
{
    public function __construct(private FindCategoryAttributeByIdTask $task) {}

    public function run($id)
    {
        return $this->task->run($id);
    }
}
