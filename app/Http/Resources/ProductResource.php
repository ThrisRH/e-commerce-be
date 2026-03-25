<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'image_url' => $this->image_url,
            'stock' => $this->stock,
            'price' => $this->price,

            'is_active' => $this->is_active,

            'category' => [
                'id' => $this->category?->id,
                'name' => $this->category?->name,
            ],

            'brand' => [
                'id' => $this->brand?->id,
                'name' => $this->brand?->name,
            ],

            'attributes' => $this->productAttributes->map(function ($item) {
                return [
                    'id' => $item->attribute->id,
                    'name' => $item->attribute->name,
                    'value' => $item->value,
                    'unit' => $item->attribute->unit,
                ];
            }),

            'updated_at' => $this->updated_at->format('Y-m-d'),
            'created_at' => $this->created_at->format('Y-m-d'),

        ];
    }
}
