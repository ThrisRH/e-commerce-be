<?php

namespace App\Containers\CatalogSection\Product\Actions;

use App\Containers\CatalogSection\Product\Tasks\GetAllByCateTask;
use App\Ship\Parents\Actions\Action;

class GetAllByCateAction extends Action
{
    public function run($cate_id, $numberOfProducts = null)
    {
        return app(GetAllByCateTask::class)->run($cate_id, $numberOfProducts);
    }
}
