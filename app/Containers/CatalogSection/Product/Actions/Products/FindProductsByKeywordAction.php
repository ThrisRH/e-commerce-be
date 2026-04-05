<?php

namespace App\Containers\CatalogSection\Product\Actions\Products;

use App\Containers\CatalogSection\Product\Tasks\Products\FindProductsByKeywordTask;
use App\Ship\Parents\Actions\Action;

class FindProductsByKeywordAction extends Action
{
    public function __construct(private FindProductsByKeywordTask $task) {}

    public function run(string $keyword, int $limit = 10)
    {
        return $this->task->run($keyword, $limit);
    }
}
