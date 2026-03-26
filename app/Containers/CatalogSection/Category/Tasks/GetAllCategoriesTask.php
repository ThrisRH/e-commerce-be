<?php

namespace App\Containers\CatalogSection\Category\Tasks;

use App\Containers\CatalogSection\Category\Models\Category;
use App\Ship\Parents\Tasks\Task;

class GetAllCategoriesTask extends Task
{
    public function run()
    {
        return Category::with('categoryAttributes.attribute')->latest()->get();
    }
}
