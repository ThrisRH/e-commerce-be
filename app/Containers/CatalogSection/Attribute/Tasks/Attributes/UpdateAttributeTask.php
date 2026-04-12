<?php

namespace App\Containers\CatalogSection\Attribute\Tasks\Attributes;

use App\Containers\CatalogSection\Attribute\Models\Attribute;
use App\Ship\Parents\Tasks\Task;

class UpdateAttributeTask extends Task
{
    public function run(Attribute $attribute, array $data): Attribute
    {
        $attribute->update($data);

        return $attribute;
    }
}
