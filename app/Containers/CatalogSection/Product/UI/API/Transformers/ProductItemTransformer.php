<?php

namespace App\Containers\CatalogSection\Product\UI\API\Transformers;

class ProductItemTransformer
{
    public function collection($productItems)
    {
        return $productItems->map(fn ($productItem) => $this->transform($productItem));
    }

    public function transform($productItem)
    {
        $variants = $productItem->variants;

        return [
            'id' => $productItem->id,
            'name' => $productItem->name,
            'slug' => $productItem->slug,

            'sku' => $productItem->defaultVariant->sku,

            'image_url' => $productItem->defaultVariant->image_url
                ?? $productItem->product->image_url,

            'is_active' => $productItem->is_active,

            'brand' => [
                'id' => $productItem->product->brand?->id,
                'name' => $productItem->product->brand?->name,
            ],

            'category' => [
                'id' => $productItem->product->category?->id,
                'name' => $productItem->product->category?->name,
            ],

            'price_min' => $variants->min('price'),
            'price_max' => $variants->max('price'),

            'total_stock' => $variants->sum('stock'),

            'variants_count' => $variants->count(),

            'stock_status' => $variants->sum('stock') > 0 ? 'in_stock' : 'out_of_stock',

            'updated_at' => optional($productItem->updated_at)->format('Y-m-d'),
        ];
    }
}
