<?php

namespace App\Containers\CatalogSection\Category\Tasks\CategoryAttributes;

use App\Containers\CatalogSection\Category\Models\CategoryAttribute;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Validation\ValidationException;

class ValidateCategoryAttributesTask extends Task
{
    public function run($categoryId, array $attributes)
    {
        $validAttributeIds = CategoryAttribute::where('category_id', $categoryId)
            ->pluck('attribute_id')
            ->toArray();

        foreach ($attributes as $attr) {
            if (! in_array($attr['attribute_id'], $validAttributeIds)) {
                throw ValidationException::withMessages([
                    'attributes' => 'Invalid attribute for this category.',
                ]);
            }
        }
    }
}
