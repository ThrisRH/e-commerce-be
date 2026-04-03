<?php

namespace App\Containers\PromotionSection\Promotion\UI\API\Transformers;

class ProductPromotionTransfomer
{
    public function collection($request)
    {
        return $request->map(fn ($request) => $this->transform($request));
    }

    public function transform($request)
    {
        return [
            'id' => $request->id,
            'product' => $request->product,
            'promotion' => $request->promotion,
        ];
    }
}
