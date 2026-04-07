<?php

namespace App\Containers\CatalogSection\Category\Actions\Categories;

use App\Containers\CatalogSection\Category\Tasks\Categories\FindCateByKeywordTask;
use App\Ship\Parents\Actions\Action;

class FindCateByNameAction extends Action
{
    public function __construct(private FindCateByKeywordTask $findCateByKeywordTask) {}

    public function run($keyword, $limit)
    {
        return $this->findCateByKeywordTask->run($keyword, $limit);
    }
}
