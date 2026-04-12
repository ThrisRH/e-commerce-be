<?php

namespace App\Containers\CatalogSection\Product\Actions\Products\Queries;

use App\Containers\CatalogSection\Product\Tasks\Products\GetAllProductsTask;
use App\Ship\Parents\Actions\Action;

class GetAllProductsAction extends Action
{
    public function __construct(private GetAllProductsTask $getAllProductsTask) {}

    public function run(int $limit)
    {
        return $this->getAllProductsTask->run($limit);
    }
}
