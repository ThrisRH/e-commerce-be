<?php

namespace App\Containers\OrderSection\Shipping\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingExtraFee extends Model
{
    protected $fillable = [
        'name',
        'value',
        'type',
        'coefficient',
    ];

    protected $casts = [
        'value' => 'integer',
        'coefficient' => 'float',
    ];
}
