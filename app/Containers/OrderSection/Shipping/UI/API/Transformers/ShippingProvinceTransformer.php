<?php

namespace App\Containers\OrderSection\Shipping\UI\API\Transformers;

use App\Containers\OrderSection\Shipping\Models\ShippingProvince;
use App\Ship\Parents\Transformers\Transformer;

class ShippingProvinceTransformer extends Transformer
{
    protected array $defaultIncludes = [];

    protected array $availableIncludes = [];

    public function collection(ShippingProvince $province): array
    {
        return [
            'object' => $province->getResourceKey(),
            'id' => $province->getHashedKey(),
            'name' => $province->name,
            'created_at' => $province->created_at,
            'updated_at' => $province->updated_at,
        ];
    }

    public function transform(ShippingProvince $province): array
    {
        return [
            'object' => $province->getResourceKey(),
            'id' => $province->getHashedKey(),
            'name' => $province->name,
            'created_at' => $province->created_at,
            'updated_at' => $province->updated_at,
        ];
    }
}
