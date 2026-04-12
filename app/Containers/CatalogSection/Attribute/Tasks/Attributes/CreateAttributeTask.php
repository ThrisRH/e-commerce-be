<?php

namespace App\Containers\CatalogSection\Attribute\Tasks\Attributes;

use App\Containers\CatalogSection\Attribute\Models\Attribute;
use App\Ship\Parents\Tasks\Task;

class CreateAttributeTask extends Task
{
    public function run(array $data): Attribute
    {
        return Attribute::create($data);
    }
}
