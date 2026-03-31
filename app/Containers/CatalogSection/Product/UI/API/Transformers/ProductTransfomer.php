<?php

namespace App\Containers\CatalogSection\Product\UI\API\Transformers;

class ProductTransfomer
{
    public function collection($products)
    {
        return $products->map(fn ($product) => $this->transform($product));
    }

    public function transform($product)
    {
        return [
            'id' => $product->id,
            'name' => $product->name,
            'slug' => $product->slug,
            'description' => $product->description,
            'image_url' => $product->image_url,
            'stock' => $product->stock,
            'price' => $product->price,
            'is_new' => $product->is_new,

            'is_active' => $product->is_active,

            'category' => [
                'id' => $product->category?->id,
                'name' => $product->category?->name,
            ],

            'brand' => [
                'id' => $product->brand?->id,
                'name' => $product->brand?->name,
            ],

            'attributes' => $product->productAttributes->map(function ($item) {
                return [
                    'id' => $item->attribute->id,
                    'name' => $item->attribute->name,
                    'value' => $item->value,
                    'unit' => $item->attribute->unit,
                ];
            })->toArray(),

            'updated_at' => optional($product->updated_at)->format('Y-m-d'),
            'created_at' => optional($product->created_at)->format('Y-m-d'),
        ];
    }
}
