<?php

namespace App\Containers\CatalogSection\Product\Tasks;

use App\Containers\CatalogSection\Category\Models\CategoryAttribute;
use App\Containers\CatalogSection\Product\Models\Product;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Validation\ValidationException;

class SyncProductAttributesTask extends Task
{
    public function run(Product $product, array $attributes)
    {
        $validAttributeId = CategoryAttribute::where('category_id', $product->category_id)
            ->pluck('attribute_id')
            ->toArray();

        $newAttributes = collect($attributes)->keyBy('attribute_id');
        $newIds = $newAttributes->keys()->toArray();

        $product->productAttributes()
            ->whereNotIn('attribute_id', $newIds)
            ->delete();

        foreach ($newAttributes as $attrId => $attr) {
            if (! isset($attr['value'])) {
                throw ValidationException::withMessages([
                    "attributes.$attrId" => 'Attribute value is required',
                ]);
            }

            if (! in_array($attrId, $validAttributeId)) {
                throw ValidationException::withMessages([
                    "attributes.$attrId" => 'Invalid attribute',
                ]);
            }

            $product->productAttributes()->updateOrCreate(
                ['attribute_id' => $attrId],
                ['value' => $attr['value']]
            );
        }
    }
}
