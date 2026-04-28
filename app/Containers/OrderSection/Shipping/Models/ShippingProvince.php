<?php

namespace App\Containers\OrderSection\Shipping\Models;

use App\Ship\Parents\Models\Model;

class ShippingProvince extends Model
{
    protected $fillable = [
        'name',
    ];
}
