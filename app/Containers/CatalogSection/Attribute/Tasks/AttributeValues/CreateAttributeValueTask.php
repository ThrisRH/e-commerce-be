<?php

namespace App\Containers\CatalogSection\Attribute\Tasks\AttributeValues;

use App\Containers\CatalogSection\Attribute\Models\AttributeValue;
use App\Ship\Parents\Tasks\Task;

class CreateAttributeValueTask extends Task
{
    public function run(array $data): AttributeValue
    {
        $attributeValue = AttributeValue::create($data);

        return $attributeValue;
    }
}
