<?php

namespace App\Containers\CatalogSection\Brand\Tasks;

use App\Containers\CatalogSection\Brand\Models\Brand;
use App\Ship\Parents\Tasks\Task;

class UpdateBrandTask extends Task
{
    public function run(Brand $brand, array $data)
    {
        $changed = array_filter($data, fn ($value, $key) => $value !== $brand->$key, ARRAY_FILTER_USE_BOTH);

        if (empty($changed)) {
            return $brand;
        }

        $brand->update($changed);
    }
}
