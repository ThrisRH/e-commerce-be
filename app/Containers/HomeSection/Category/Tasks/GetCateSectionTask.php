<?php

namespace App\Containers\HomeSection\Category\Tasks;

use App\Containers\CatalogSection\Category\Models\Category;
use App\Ship\Parents\Tasks\Task;

class GetCateSectionTask extends Task
{
    public function run(array $cate_id, int $limit = 5)
    {
        return Category::with(['products' => function ($q) use ($limit) {
            $q->latest()->take($limit);
        }])->whereIn('id', $cate_id)->get();

    }
}
