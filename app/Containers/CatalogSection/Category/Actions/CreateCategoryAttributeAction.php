<?php

namespace App\Containers\CatalogSection\Category\Actions;

use App\Containers\CatalogSection\Category\Tasks\CreateCategoryAttributeTask;
use App\Ship\Parents\Actions\Action;

class CreateCategoryAttributeAction extends Action
{
    public function __construct(private CreateCategoryAttributeTask $task) {}

    public function run(array $data)
    {
        return $this->task->run($data);
    }
}
