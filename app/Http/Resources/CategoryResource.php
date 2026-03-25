<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'is_active' => $this->is_active,
            'description' => $this->description,
            'image_url' => $this->image_url,
            'parent_category' => $this->parentCategory ? [
                'id' => $this->parentCategory->id,
                'name' => $this->parentCategory->name,
                'slug' => $this->parentCategory->slug,
            ] : null,

            'attributes' => $this->categoryAttributes->map(function ($item) {
                return [
                    'id' => $item->attribute->id,
                    'name' => $item->attribute->name,
                ];
            }),
        ];
    }
}
