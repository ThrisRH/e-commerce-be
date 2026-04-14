<?php

namespace App\Containers\OrderSection\Shipping\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingZone extends Model
{
    protected $fillable = [
        'name',
        'type',
        'density_factor',
        'estimated_stops',
    ];

    protected $casts = [
        'density_factor' => 'float',
        'estimated_stops' => 'integer',
    ];

    public function areas()
    {
        return $this->hasMany(ShippingZoneArea::class);
    }

    public function rates()
    {
        return $this->hasMany(ShippingRate::class);
    }
}
