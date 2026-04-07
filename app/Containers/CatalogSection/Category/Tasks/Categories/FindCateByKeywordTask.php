<?php

namespace App\Containers\CatalogSection\Category\Tasks\Categories;

use App\Containers\CatalogSection\Category\Models\Category;
use App\Ship\Parents\Tasks\Task;

class FindCateByKeywordTask extends Task
{
    public function run($keyword, $limit)
    {
        return Category::where('name', 'LIKE', "%{$keyword}%")->latest()->paginate($limit);
    }
}
