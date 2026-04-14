<?php

namespace App\Containers\OrderSection\Shipping\UI\API\Transformer;

use App\Containers\OrderSection\Shipping\Models\ShippingRate;
use App\Ship\Parents\Transformers\Transformer;

class ShippingRateTransformer extends Transformer
{
    public function transform(ShippingRate $shippingRate)
    {
        return [
            'id' => $shippingRate->id,
            'shipping_zone_id' => $shippingRate->shipping_zone_id,
            'shipping_method_id' => $shippingRate->shipping_method_id,
            'base_fee' => $shippingRate->base_fee,
            'max_fee' => $shippingRate->max_fee,
            'min_fee' => $shippingRate->min_fee,
            'shipping_zone' => [
                'id' => $shippingRate->shippingZone->id,
                'name' => $shippingRate->shippingZone->name,
                'type' => $shippingRate->shippingZone->type,
                'density_factor' => $shippingRate->shippingZone->density_factor,
                'estimated_stops' => $shippingRate->shippingZone->estimated_stops,
            ],
            'shipping_method' => [
                'id' => $shippingRate->shippingMethod->id,
                'name' => $shippingRate->shippingMethod->name,
                'time_coefficient' => $shippingRate->shippingMethod->time_coefficient,
                'distance_coefficient' => $shippingRate->shippingMethod->distance_coefficient,
                'max_weight' => $shippingRate->shippingMethod->max_weight,
                'max_volume' => $shippingRate->shippingMethod->max_volume,
            ],
        ];
    }
}
