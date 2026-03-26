<?php

namespace App\Containers\CatalogSection\Brand\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class brand extends Model
{
    protected $fillable = [
        'name',
        'slug',
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
