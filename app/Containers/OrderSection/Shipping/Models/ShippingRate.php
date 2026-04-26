<?php

namespace App\Containers\OrderSection\Shipping\Models;

use App\Ship\Parents\Models\Model;

class ShippingRate extends Model
{
    protected $fillable = [
        'shipping_zone_id',
        'shipping_method_id',
        'base_fee',
        'max_fee',
        'min_fee',
        'base_weight',
        'step_weight',
        'step_fee',
    ];

    protected $casts = [
        'base_fee' => 'integer',
        'max_fee' => 'integer',
        'min_fee' => 'integer',
        'base_weight' => 'float',
        'step_weight' => 'float',
        'step_fee' => 'integer',
    ];

    public function shippingZone()
    {
        return $this->belongsTo(ShippingZone::class);
    }

    public function shippingMethod()
    {
        return $this->belongsTo(ShippingMethod::class);
    }
}
