<?php

namespace App\Containers\OrderSection\Shipping\Models;

use App\Ship\Parents\Models\Model;

class ShippingArea extends Model
{
    protected $fillable = [
        'city_id',
        'province_id',
        'level_code',
    ];

    public function city()
    {
        return $this->belongsTo(ShippingCity::class, 'city_id');
    }

    public function province()
    {
        return $this->belongsTo(ShippingProvince::class, 'province_id');
    }
}
