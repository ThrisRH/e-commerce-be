<?php

namespace App\Containers\CatalogSection\Attribute\Tasks\AttributeValues;

use App\Containers\CatalogSection\Attribute\Models\AttributeValue;
use App\Ship\Parents\Tasks\Task;

class UpdateAttributeValueTask extends Task
{
    public function run(AttributeValue $attributeValue, array $data): AttributeValue
    {
        $attributeValue->update(array_filter([
            'value' => $data['value'] ?? $attributeValue->value,
            'unit' => $data['unit'] ?? $attributeValue->unit,
            'attribute_id' => $data['attribute_id'] ?? $attributeValue->attribute_id,
        ]));

        return $attributeValue;
    }
}
