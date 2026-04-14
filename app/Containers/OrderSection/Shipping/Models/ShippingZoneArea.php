<?php

namespace App\Containers\OrderSection\Shipping\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingZoneArea extends Model
{
    protected $fillable = [
        'shipping_zone_id',
        'province',
        'distince', // matching typo in migration
        'ward',
    ];

    public function shippingZone()
    {
        return $this->belongsTo(ShippingZone::class);
    }
}
