<?php

namespace App\Containers\CatalogSection\Category\Actions;

use App\Containers\CatalogSection\Category\Tasks\FindCategoryByIdTask;
use App\Ship\Parents\Actions\Action;

class FindCategoryByIdAction extends Action
{
    private $findCategoryByIdTask;

    public function __construct(FindCategoryByIdTask $findCategoryByIdTask)
    {
        $this->findCategoryByIdTask = $findCategoryByIdTask;
    }

    public function run($id)
    {
        return $this->findCategoryByIdTask->run($id);
    }
}
