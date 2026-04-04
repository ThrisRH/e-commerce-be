<?php

namespace App\Containers\CatalogSection\Category\Actions\CategoryAttributes;

use App\Containers\CatalogSection\Category\Tasks\CategoryAttributes\GetAllCategoryAttributesTask;
use App\Ship\Parents\Actions\Action;
use Illuminate\Database\Eloquent\Collection;

class GetAllCategoryAttributesAction extends Action
{
    public function __construct(private GetAllCategoryAttributesTask $task) {}

    public function run(): Collection
    {
        return $this->task->run();
    }
}
