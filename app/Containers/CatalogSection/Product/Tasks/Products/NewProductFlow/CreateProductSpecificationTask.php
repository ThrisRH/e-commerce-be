<?php

namespace App\Containers\CatalogSection\Product\Tasks\Products\NewProductFlow;

use App\Containers\CatalogSection\Product\Models\ProductSpecification;
use App\Ship\Parents\Tasks\Task;

class CreateProductSpecificationTask extends Task
{
    public function run($data)
    {
        $product = ProductSpecification::create($data);

        return $product;
    }
}
