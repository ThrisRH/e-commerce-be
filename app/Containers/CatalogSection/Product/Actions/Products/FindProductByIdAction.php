<?php

namespace App\Containers\CatalogSection\Product\Actions\Products;

use App\Containers\CatalogSection\Product\Tasks\Products\FindProductByIdTask;
use App\Ship\Parents\Actions\Action;

class FindProductByIdAction extends Action
{
    public function __construct(private FindProductByIdTask $findProductByIdTask) {}

    public function run($id)
    {
        return $this->findProductByIdTask->run($id);
    }
}
