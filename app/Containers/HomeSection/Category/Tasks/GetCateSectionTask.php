<?php

namespace App\Containers\HomeSection\Category\Tasks;

use App\Containers\CatalogSection\Category\Models\Category;
use App\Ship\Parents\Tasks\Task;

class GetCateSectionTask extends Task
{
    public function run(?array $cate_ids = null, int $limit = 10)
    {
        return Category::with(['products' => function ($q) use ($limit) {
            $q->latest()
              ->with(['productItems' => function($qItem) {
                  $qItem->with(['defaultVariant']);
              }])
              ->take($limit);
        }])->whereIn('id', $cate_ids)->get();
    }
}
