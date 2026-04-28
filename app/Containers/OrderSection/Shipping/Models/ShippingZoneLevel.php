<?php

namespace App\Containers\OrderSection\Shipping\Models;

use App\Ship\Parents\Models\Model;

class ShippingZoneLevel extends Model
{
    protected $fillable = [
        'code',
        'name',
        'description',
        'priority',
    ];

    protected $casts = [
        'priority' => 'integer',
    ];
}
