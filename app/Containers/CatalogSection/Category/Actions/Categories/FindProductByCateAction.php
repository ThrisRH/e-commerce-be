<?php

namespace App\Containers\CatalogSection\Category\Actions\Categories;

use App\Containers\CatalogSection\Category\Tasks\Categories\FindProductByCateTask;
use App\Ship\Parents\Actions\Action;

class FindProductByCateAction extends Action
{
    public function __construct(private FindProductByCateTask $task) {}

    public function run($id)
    {
        return $this->task->run($id);
    }
}
