<?php

namespace App\Containers\OrderSection\Shipping\UI\API\Transformers;

use App\Containers\OrderSection\Shipping\Models\ShippingCity;
use App\Ship\Parents\Transformers\Transformer;

class ShippingCityTransformer extends Transformer
{
    protected array $defaultIncludes = [];

    public function collection(ShippingCity $city): array
    {
        return [
            'object' => $city->getResourceKey(),
            'id' => $city->getHashedKey(),
            'name' => $city->name,
            'created_at' => $city->created_at,
            'updated_at' => $city->updated_at,
        ];
    }

    public function transform(ShippingCity $city): array
    {
        return [
            'object' => $city->getResourceKey(),
            'id' => $city->getHashedKey(),
            'name' => $city->name,
            'created_at' => $city->created_at,
            'updated_at' => $city->updated_at,
        ];
    }
}
