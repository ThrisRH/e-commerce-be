<?php

namespace App\Containers\CatalogSection\Brand\Tasks;

use App\Containers\CatalogSection\Brand\Models\Brand;
use App\Ship\Parents\Tasks\Task;

class CreateBrandTask extends Task
{
    public function run(array $data)
    {
        return Brand::create($data);
    }
}
