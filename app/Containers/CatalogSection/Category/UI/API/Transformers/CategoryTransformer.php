<?php

namespace app\Containers\CatalogSection\Category\UI\API\Transformers;

class CategoryTransformer
{
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
        ];
    }
}
