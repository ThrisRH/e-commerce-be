<?php

namespace App\Containers\CatalogSection\Brand\Tasks;

use App\Containers\CatalogSection\Brand\Models\Brand;
use App\Ship\Parents\Tasks\Task;

class GetByBrandIdTask extends Task
{
    public function run(int $id): ?Brand
    {
        return Brand::find($id);
    }
}
