<?php

namespace App\Containers\CatalogSection\Category\UI\API\Transformers;

class CategoryTransformer
{
    public function collection($categories)
    {
        return $categories->map(fn ($category) => $this->transform($category));
    }

    public function transform($category)
    {
        return [
            'id' => $category->id,
            'name' => $category->name,
            'slug' => $category->slug,
            'is_active' => $category->is_active,
            'description' => $category->description,
            'image_url' => $category->image_url,
            'parent_category' => $category->parentCategory ? [
                'id' => $category->parentCategory->id,
                'name' => $category->parentCategory->name,
                'slug' => $category->parentCategory->slug,
            ] : null,

            'attributes' => $category->categoryAttributes->map(function ($item) {
                return [
                    'id' => $item->attribute->id,
                    'name' => $item->attribute->name,
                ];
            }),

            'products' => $category->products->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'slug' => $product->slug,
                    'price' => $product->price,
                    'image_url' => $product->image_url,
                ];
            }),
        ];
    }
}
