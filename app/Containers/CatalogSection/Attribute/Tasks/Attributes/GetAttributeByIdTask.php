<?php

namespace App\Containers\CatalogSection\Attribute\Tasks\Attributes;

use App\Containers\CatalogSection\Attribute\Models\Attribute;
use App\Ship\Parents\Tasks\Task;

class GetAttributeByIdTask extends Task
{
    public function run($id): ?Attribute
    {
        return Attribute::find($id);
    }
}
