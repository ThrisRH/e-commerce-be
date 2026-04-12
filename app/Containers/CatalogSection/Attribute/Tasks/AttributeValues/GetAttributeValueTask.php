<?php

namespace App\Containers\CatalogSection\Attribute\Tasks\AttributeValues;

use App\Containers\CatalogSection\Attribute\Models\AttributeValue;
use App\Ship\Parents\Tasks\Task;

class GetAttributeValueTask extends Task
{
    public function run(?int $limit)
    {
        $attributeValues = $limit ? AttributeValue::latest()->paginate($limit) : AttributeValue::latest()->get();

        return $attributeValues;
    }
}
