<?php

namespace App\Containers\CatalogSection\Attribute\Tasks;

use App\Containers\CatalogSection\Attribute\Models\Attribute;
use App\Ship\Parents\Tasks\Task;

class CreateAttributeTask extends Task
{
    public function run(array $data): Attribute
    {
        return Attribute::create($data);
    }
}
