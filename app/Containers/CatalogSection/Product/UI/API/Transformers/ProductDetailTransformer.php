<?php

namespace App\Containers\CatalogSection\Product\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer;

class ProductDetailTransformer extends Transformer
{
    public function transform($productDetail)
    {
        return [
            'id' => $productDetail->id,
            'name' => $productDetail->productItem->name,
            'sku' => $productDetail->sku,
            'price' => $productDetail->price,
            'stock' => $productDetail->stock,
            'image_url' => $productDetail->image_url,
            'is_active' => $productDetail->is_active,
            'is_default' => $productDetail->is_default,
            'basic_info' => [
                'description' => $productDetail->productItem->product->description,
                'slug' => $productDetail->productItem->slug,
                'category' => [
                    'id' => $productDetail->productItem->product->category?->id,
                    'name' => $productDetail->productItem->product->category?->name,
                ],
                'brand' => [
                    'id' => $productDetail->productItem->product->brand?->id,
                    'name' => $productDetail->productItem->product->brand?->name,
                ],
            ],
            'others_variant' => $productDetail->productItem->product->productItems->map(function ($variant) {
                return [
                    'slug' => $variant->slug,
                    'variants' => $variant->variants->map(function ($variant) {
                        return [
                            'sku' => $variant->sku,
                            'price' => $variant->price,
                            'stock' => $variant->stock,
                            'image_url' => $variant->image_url,
                            'is_default' => $variant->is_default,
                            'attribute_value' => $variant->variantValues->map(function ($variantValue) {
                                return [
                                    'attribute_id' => $variantValue->attributeValue->attribute_id,
                                    'attribute_name' => $variantValue->attributeValue->attribute->name,
                                    'attribute_value_id' => $variantValue->attribute_value_id,
                                    'attribute_value_name' => $variantValue->attributeValue->value,
                                    'attribute_unit' => $variantValue->attributeValue->unit,
                                ];
                            }),
                        ];
                    }),
                ];
            }),

            'product_specifications' => $productDetail->productItem->product->productSpecifications->map(function ($productSpecification) {
                return [
                    'attribute_id' => $productSpecification->attribute_id,
                    'attribute_name' => $productSpecification->attribute->name,
                    'attribute_value' => $productSpecification->value,
                    'attribute_unit' => $productSpecification->unit,
                ];
            }),

            'updated_at' => optional($productDetail->updated_at)->format('Y-m-d'),
            'created_at' => optional($productDetail->created_at)->format('Y-m-d'),
        ];
    }
}
