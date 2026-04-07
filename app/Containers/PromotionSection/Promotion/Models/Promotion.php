<?php

namespace App\Containers\PromotionSection\Promotion\Models;

use App\Containers\CatalogSection\Brand\Models\Brand;
use App\Containers\CatalogSection\Category\Models\Category;
use App\Containers\CatalogSection\Product\Models\Product;
use App\Ship\Parents\Models\Model;

class Promotion extends Model
{
    protected $fillable = [
        'name',
        'description',
        'type',
        'strategy_key',
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

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'stackable' => 'boolean',
        'is_active' => 'boolean',
        'value' => 'integer',
        'max_discount' => 'integer',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_promotions');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'promotion_categories');
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'promotion_brands');
    }
}
