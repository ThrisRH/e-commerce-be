<?php

namespace App\Containers\CatalogSection\Category\Actions\Categories;

use App\Containers\CatalogSection\Category\Tasks\Categories\GetAllCategoriesTask;
use App\Ship\Parents\Actions\Action;
use Illuminate\Database\Eloquent\Collection;

class GetAllCategoriesAction extends Action
{
    public function __construct(private GetAllCategoriesTask $task) {}

    public function run(): Collection
    {
        return $this->task->run();
    }
}
