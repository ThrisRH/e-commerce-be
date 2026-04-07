<?php

namespace App\Containers\CatalogSection\Category\Tasks\Categories;

use App\Containers\CatalogSection\Category\Models\Category;
use App\Ship\Parents\Tasks\Task;

class FindCategoryBySlugTask extends Task
{
    public function run(string $slug)
    {
        return Category::where('slug', $slug)->first();
    }
}
