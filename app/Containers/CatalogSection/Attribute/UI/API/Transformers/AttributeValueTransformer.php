<?php

namespace App\Containers\CatalogSection\Attribute\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer;

class AttributeValueTransformer extends Transformer
{
    public function collection($attributeValue)
    {
        return $attributeValue->map(function ($value) {
            return $this->transform($value);
        });
    }

    public function transform($attributeValue): array
    {
        return [
            'id' => $attributeValue->id,
            'attribute_id' => $attributeValue->attribute_id,
            'attribute_name' => $attributeValue->attribute?->name,
            'value' => $attributeValue->value,
            'unit' => $attributeValue->unit,
            'created_at' => $attributeValue->created_at,
            'updated_at' => $attributeValue->updated_at,
        ];
    }
}
