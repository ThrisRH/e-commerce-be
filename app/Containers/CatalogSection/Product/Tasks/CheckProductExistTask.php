<?php

namespace App\Containers\CatalogSection\Product\Tasks;

use App\Containers\CatalogSection\Product\Models\Product;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Str;

class CheckProductExistTask extends Task
{
    public function run(string $name, $excludeId = null): bool
    {
        $slug = Str::slug($name);

        $query = Product::where('slug', $slug);

        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        return $query->exists();
    }
}
