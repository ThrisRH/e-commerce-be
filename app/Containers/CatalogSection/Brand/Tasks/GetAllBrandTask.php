<?php

namespace App\Containers\CatalogSection\Brand\Tasks;

use App\Containers\CatalogSection\Brand\Models\Brand;
use App\Ship\Parents\Tasks\Task;

class GetAllBrandTask extends Task
{
    public function run()
    {
        return Brand::all();
    }
}
