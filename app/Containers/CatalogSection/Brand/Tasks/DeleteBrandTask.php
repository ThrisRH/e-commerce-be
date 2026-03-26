<?php

namespace App\Containers\CatalogSection\Brand\Tasks;

use App\Containers\CatalogSection\Brand\Models\Brand;
use App\Ship\Parents\Tasks\Task;

class DeleteBrandTask extends Task
{
    public function run(Brand $brand): void
    {
        $brand->delete();
    }
}
