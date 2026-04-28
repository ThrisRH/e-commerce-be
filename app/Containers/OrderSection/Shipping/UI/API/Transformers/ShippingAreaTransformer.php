<?php

namespace App\Containers\OrderSection\Shipping\UI\API\Transformers;

use App\Containers\OrderSection\Shipping\Models\ShippingArea;
use App\Ship\Parents\Transformers\Transformer;

class ShippingAreaTransformer extends Transformer
{
    protected array $defaultIncludes = [
        'city',
        'province',
    ];

    protected array $availableIncludes = [];

    public function collection(ShippingArea $area): array
    {
        return [
            'object' => $area->getResourceKey(),
            'id' => $area->getHashedKey(),
            'city_id' => $area->getHashedKey('city_id'),
            'province_id' => $area->getHashedKey('province_id'),
            'level_code' => $area->level_code,
            'created_at' => $area->created_at,
            'updated_at' => $area->updated_at,
        ];
    }

    public function transform(ShippingArea $area): array
    {
        return [
            'object' => $area->getResourceKey(),
            'id' => $area->getHashedKey(),
            'city_id' => $area->getHashedKey('city_id'),
            'province_id' => $area->getHashedKey('province_id'),
            'level_code' => $area->level_code,
            'created_at' => $area->created_at,
            'updated_at' => $area->updated_at,
        ];
    }

    public function includeCity(ShippingArea $area)
    {
        return $area->city ? $this->transform($area->city, ShippingCityTransformer::class) : null;
    }

    public function includeProvince(ShippingArea $area)
    {
        return $area->province ? $this->transform($area->province, ShippingProvinceTransformer::class) : null;
    }
}
