<?php

namespace App\Containers\CatalogSection\Product\Actions\Products;

use App\Containers\CatalogSection\Product\Tasks\Products\DeleteProductTask;
use App\Ship\Parents\Actions\Action;

class DeleteProductAction extends Action
{
    public function __construct(private DeleteProductTask $deleteProductTask) {}

    public function run($id)
    {
        return $this->deleteProductTask->run($id);
    }
}
