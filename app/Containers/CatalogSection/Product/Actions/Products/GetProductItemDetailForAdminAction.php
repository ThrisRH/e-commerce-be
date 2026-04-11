<?php

namespace App\Containers\CatalogSection\Product\Actions\Products;

use App\Containers\CatalogSection\Product\Tasks\Products\NewProductFlow\GetProductItemBySlugTask;
use App\Ship\Parents\Actions\Action;

class GetProductItemDetailForAdminAction extends Action
{
    public function __construct(private GetProductItemBySlugTask $findProductItemBySlugTask) {}

    public function run($slug)
    {
        $productItem = $this->findProductItemBySlugTask->run($slug);

        return $productItem;
    }
}
