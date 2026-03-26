<?php

namespace App\Containers\CatalogSection\Product\Actions;

use App\Containers\CatalogSection\Product\Tasks\GetAllProductsTask;
use App\Ship\Parents\Actions\Action;

class GetAllProductsAction extends Action
{
    private $getAllProductsTask;

    public function __construct(GetAllProductsTask $getAllProductsTask)
    {
        $this->getAllProductsTask = $getAllProductsTask;
    }

    public function run()
    {
        return $this->getAllProductsTask->run();
    }
}
