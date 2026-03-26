<?php

namespace App\Containers\CatalogSection\Brand\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Brand extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    protected static function booted()
    {
        static::creating(function ($brand) {
            $brand->slug = Str::slug($brand->name);
        });

        static::updating(function ($brand) {
            $brand->slug = Str::slug($brand->name);
        });
    }
}
