<?php

namespace App\Containers\CatalogSection\Attribute\UI\API\Transformers;

use App\Containers\CatalogSection\Attribute\Models\Attribute;
use App\Ship\Parents\Transformers\Transformer;

class AttributeTransformer extends Transformer
{
    public function collection($attributes)
    {
        return $attributes->map(function ($attribute) {
            return $this->transform($attribute);
        });
    }

    public function transform(Attribute $attribute): array
    {
        return [
            'id' => $attribute->id,
            'name' => $attribute->name,
            'slug' => $attribute->slug,
            'data_type' => $attribute->data_type,
            'unit' => $attribute->unit,
            'is_filterable' => (bool) $attribute->is_filterable,
            'is_required' => (bool) $attribute->is_required,
            'created_at' => $attribute->created_at,
            'updated_at' => $attribute->updated_at,
        ];
    }
}
