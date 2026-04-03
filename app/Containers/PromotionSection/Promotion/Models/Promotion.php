<?php

namespace App\Containers\PromotionSection\Promotion\Models;

use App\Containers\CatalogSection\Product\Models\Product;
use App\Ship\Parents\Models\Model;

class Promotion extends Model
{
    protected $fillable = [
        'name',
        'description',
        'type',
        'value',
        'max_discount',
        'start_date',
        'end_date',
        'stackable',
        'is_active',
        'priority',
        'usage_limit',
        'usage_count',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_promotion');
    }
}
