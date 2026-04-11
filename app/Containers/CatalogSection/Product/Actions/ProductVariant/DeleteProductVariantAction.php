<?php

namespace App\Containers\CatalogSection\Product\Actions\ProductVariant;

use App\Containers\CatalogSection\Product\Tasks\ProductVariant\DeleteProductVariantTask;
use App\Containers\CatalogSection\Product\Tasks\ProductVariant\FindProductVariantById;
use App\Ship\Parents\Actions\Action;

class DeleteProductVariantAction extends Action
{
    public function __construct(private DeleteProductVariantTask $deleteTask,
        private FindProductVariantById $findTask) {}

    public function run($id)
    {
        $variant = $this->findTask->run($id);

        return $this->deleteTask->run($variant);
    }
}
