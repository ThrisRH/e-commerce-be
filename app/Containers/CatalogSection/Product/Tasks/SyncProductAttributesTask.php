<?php

namespace App\Containers\CatalogSection\Product\Actions;

use App\Containers\AppSection\Product\Models\Product;
use App\Containers\CatalogSection\Category\Models\CategoryAttribute;
use Exception;

class SyncProductAttributes
{
    public function handle(Product $product, array $attributes)
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
                throw new Exception("Attribute $attrId must have value");
            }

            if (! in_array($attrId, $validAttributeId)) {
                throw new Exception('Invalid attribute');
            }

            $product->productAttributes()->updateOrCreate(
                ['attribute_id' => $attrId],
                ['value' => $attr['value']]
            );
        }
    }
}
