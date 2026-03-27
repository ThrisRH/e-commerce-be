<?php

namespace App\Containers\CatalogSection\Attribute\Tasks;

use App\Containers\CatalogSection\Attribute\Models\Attribute;
use App\Ship\Parents\Tasks\Task;

class DeleteAttributeTask extends Task
{
    public function run(Attribute $attribute): bool
    {
        return $attribute->delete();
    }
}
