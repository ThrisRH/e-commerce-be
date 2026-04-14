<?php

namespace App\Containers\OrderSection\Shipping\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingMethod extends Model
{
    protected $fillable = [
        'name',
        'time_coefficient',
        'distance_coefficient',
        'max_weight',
        'max_volume',
        'volumetric_divisor',
    ];

    protected $casts = [
        'time_coefficient' => 'float',
        'distance_coefficient' => 'float',
        'max_weight' => 'float',
        'max_volume' => 'float',
        'volumetric_divisor' => 'integer',
    ];
}
