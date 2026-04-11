<?php

namespace App\Containers\CatalogSection\Product\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer;

class ProductDetailAdminTransformer extends Transformer
{
    public function transform($productItem)
    {
        return [
            'id' => $productItem->id,
            'name' => $productItem->name,
            'slug' => $productItem->slug,

            'product' => [
                'id' => $productItem->product->id,
                'name' => $productItem->product->name,
                'brand' => [
                    'id' => $productItem->product->brand_id,
                    'name' => $productItem->product->brand->name,
                ],
                'category' => [
                    'id' => $productItem->product->category_id,
                    'name' => $productItem->product->category->name,
                ],
            ],

            'variants' => $productItem->variants->map(function ($variant) {
                return [
                    'id' => $variant->id,
                    'sku' => $variant->sku,
                    'price' => $variant->price,
                    'stock' => $variant->stock,
                    'is_default' => $variant->is_default,
                    'image_url' => $variant->image_url,

                    'attributes' => $variant->variantValues->map(function ($v) {
                        return [
                            'attribute_id' => $v->attributeValue->attribute_id,
                            'attribute_value_id' => $v->attribute_value_id,

                            'attribute_name' => $v->attributeValue->attribute->name,
                            'attribute_value' => $v->attributeValue->value,
                            'attribute_unit' => $v->attributeValue->unit,
                        ];
                    }),
                ];
            }),

            'product_specifications' => $productItem->product->productSpecifications->map(function ($spec) {
                return [
                    'attribute_id' => $spec->attribute_id,
                    'attribute_name' => $spec->attribute->name,
                    'value' => $spec->value,
                    'unit' => $spec->unit,
                ];
            }),
        ];
    }
}
