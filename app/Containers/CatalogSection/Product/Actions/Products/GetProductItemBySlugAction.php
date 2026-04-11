<?php

namespace App\Containers\CatalogSection\Product\Actions\Products;

use App\Containers\CatalogSection\Product\Tasks\Products\NewProductFlow\GetProductItemBySlugTask;
use App\Containers\CatalogSection\Product\Tasks\Products\NewProductFlow\GetVariantBySlugAndSkuTask;
use App\Ship\Parents\Actions\Action;

class GetProductItemBySlugAction extends Action
{
    public function __construct(private GetProductItemBySlugTask $getProductBySlugTask, private GetVariantBySlugAndSkuTask $getVariantBySlugAndSkuTask) {}

    public function run(string $slug, ?string $sku = null)
    {
        if ($sku) {
            return $this->getVariantBySlugAndSkuTask->run($slug, $sku);
        }

        return $this->getProductBySlugTask->run($slug);
    }
}
