<?php

namespace App\Containers\CatalogSection\Product\Tasks\Products\NewProductFlow;

use App\Containers\CatalogSection\Product\Models\ProductVariant;
use App\Ship\Parents\Tasks\Task;

class CheckExistsSKUTask extends Task
{
    public function run($sku)
    {
        return ProductVariant::where('sku', $sku)->exists();
    }
}
