<?php

namespace App\Containers\CatalogSection\Product\Actions;

use App\Containers\CatalogSection\Product\Tasks\DeleteProductTask;
use App\Ship\Parents\Actions\Action;

class DeleteProductAction extends Action
{
    private $deleteProductTask;

    public function __construct(DeleteProductTask $deleteProductTask)
    {
        $this->deleteProductTask = $deleteProductTask;
    }

    public function run($id)
    {
        return $this->deleteProductTask->run($id);
    }
}
