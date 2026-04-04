<?php

namespace App\Containers\CatalogSection\Category\Tasks\Categories;

use App\Containers\CatalogSection\Category\Models\Category;
use App\Ship\Parents\Tasks\Task;

class GetAllCategoriesTask extends Task
{
    public function run()
    {
        return Category::all();
    }
}
