<?php

namespace App\Containers\OrderSection\Shipping\Models;

use App\Ship\Parents\Models\Model;

class ShippingRoute extends Model
{
    protected $fillable = [
        'start_id',
        'end_id',
        'cost',
        'level_code',
    ];

    protected $casts = [
        'cost' => 'float',
    ];

    public function startArea()
    {
        return $this->belongsTo(ShippingArea::class, 'start_id');
    }

    public function endArea()
    {
        return $this->belongsTo(ShippingArea::class, 'end_id');
    }
}
