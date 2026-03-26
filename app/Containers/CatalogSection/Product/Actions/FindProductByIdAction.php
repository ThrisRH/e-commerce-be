<?php

namespace App\Containers\CatalogSection\Product\Actions;

use App\Containers\CatalogSection\Product\Tasks\FindProductByIdTask;
use App\Ship\Parents\Actions\Action;

class FindProductByIdAction extends Action
{
    private $findProductByIdTask;

    public function __construct(FindProductByIdTask $findProductByIdTask)
    {
        $this->findProductByIdTask = $findProductByIdTask;
    }

    public function run($id)
    {
        return $this->findProductByIdTask->run($id);
    }
}
