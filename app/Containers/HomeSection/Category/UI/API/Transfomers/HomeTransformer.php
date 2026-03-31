<?php

namespace App\Containers\HomeSection\Category\UI\API\Transfomers;

use App\Containers\CatalogSection\Product\UI\API\Transformers\ProductTransfomer;

class HomeTransformer
{
    public function collection($categories)
    {
        return collect($categories)
            ->map(fn ($cate) => $this->transform($cate))
            ->toArray();
    }

    public function transform($request)
    {
        return [
            'cate_id' => $request->id,
            'cate_name' => $request->name,
            'products' => new ProductTransfomer()->collection($request->products),
        ];
    }
}
