<?php

namespace App\Containers\CatalogSection\Brand\Tasks;

use App\Containers\CatalogSection\Brand\Models\Brand;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Str;

class CheckBrandExistTask extends Task
{
    public function run(string $name): bool
    {
        $result = false;
        $slug = Str::slug($name);

        if (Brand::where('slug', $slug)->exists()) {
            $result = true;
        }

        return $result;
    }
}
