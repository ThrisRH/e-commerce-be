<?php

namespace App\Containers\CatalogSection\Category\Actions\Categories;

use App\Containers\CatalogSection\Category\Tasks\Categories\DeleteCategoryTask;
use App\Ship\Parents\Actions\Action;

class DeleteCategoryAction extends Action
{
    public function __construct(private DeleteCategoryTask $task) {}

    public function run($id): int
    {
        return $this->task->run($id);
    }
}
