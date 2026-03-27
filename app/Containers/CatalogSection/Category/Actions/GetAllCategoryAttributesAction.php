<?php

namespace App\Containers\CatalogSection\Category\Actions;

use App\Containers\CatalogSection\Category\Tasks\GetAllCategoryAttributesTask;
use App\Ship\Parents\Actions\Action;

class GetAllCategoryAttributesAction extends Action
{
    public function __construct(private GetAllCategoryAttributesTask $task) {}

    public function run()
    {
        return $this->task->run();
    }
}
