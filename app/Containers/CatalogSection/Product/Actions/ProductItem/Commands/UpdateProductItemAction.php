<?php

namespace App\Containers\CatalogSection\Product\Actions\ProductItem\Commands;

use App\Containers\CatalogSection\Product\Models\ProductItem;
use App\Containers\CatalogSection\Product\Tasks\Products\NewProductFlow\UpdateProductItemTask;
use App\Ship\Parents\Actions\Action;

class UpdateProductItemAction extends Action
{
    public function __construct(
        private UpdateProductItemTask $updateProductItemTask
    ) {}

    public function run(ProductItem $item, array $data): ProductItem
    {
        return $this->updateProductItemTask->run($item, $data);
    }
}
