<?php

namespace App\Containers\CatalogSection\Product\Tasks\Products\NewProductFlow;

use App\Ship\Parents\Tasks\Task;

class GenerateSKUTask extends Task
{
    public function run(array $data)
    {
        $numberSeries = random_int(100000000, 999999999);
        $sku = $numberSeries;

        return $sku;
    }
}
