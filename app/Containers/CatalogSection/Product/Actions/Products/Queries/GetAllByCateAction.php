<?php

namespace App\Containers\CatalogSection\Product\Actions\Products\Queries;

use App\Containers\CatalogSection\Product\Tasks\Products\GetAllByCateTask;
use App\Ship\Parents\Actions\Action;

class GetAllByCateAction extends Action
{
    public function __construct(private GetAllByCateTask $getAllByCateTask) {}

    public function run($cate_id, $numberOfProducts = null)
    {
        return $this->getAllByCateTask->run($cate_id, $numberOfProducts);
    }
}
