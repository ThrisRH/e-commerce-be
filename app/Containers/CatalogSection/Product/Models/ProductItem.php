<?php

namespace App\Containers\CatalogSection\Product\Models;

use App\Ship\Parents\Models\Model;
use Illuminate\Support\Str;

class ProductItem extends Model
{
    protected $fillable = [
        'product_id',
        'name',
    ];

    protected static function booted()
    {
        static::creating(function ($productItem) {
            $productItem->slug = Str::slug($productItem->name);
        });

        static::updating(function ($productItem) {
            $productItem->slug = Str::slug($productItem->name);
        });
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function defaultVariant()
    {
        return $this->hasOne(ProductVariant::class)->where('is_default', true);
    }
}
