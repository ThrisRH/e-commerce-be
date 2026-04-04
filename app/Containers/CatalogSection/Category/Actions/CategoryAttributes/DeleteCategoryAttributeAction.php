<?php

namespace App\Containers\CatalogSection\Category\Actions\CategoryAttributes;

use App\Containers\CatalogSection\Category\Tasks\CategoryAttributes\DeleteCategoryAttributeTask;
use App\Ship\Parents\Actions\Action;

class DeleteCategoryAttributeAction extends Action
{
    public function __construct(private DeleteCategoryAttributeTask $task) {}

    public function run($id): int
    {
        return $this->task->run($id);
    }
}
