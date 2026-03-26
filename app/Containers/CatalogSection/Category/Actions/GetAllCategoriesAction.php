<?php

namespace App\Containers\CatalogSection\Category\Actions;

use App\Containers\CatalogSection\Category\Tasks\GetAllCategoriesTask;
use App\Ship\Parents\Actions\Action;

class GetAllCategoriesAction extends Action
{
    public function __construct(
        private GetAllCategoriesTask $task
    ) {}

    public function run()
    {
        return $this->task->run();
    }
}
