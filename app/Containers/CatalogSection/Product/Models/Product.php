<?php

namespace App\Containers\CatalogSection\Product\Models;

use App\Containers\CatalogSection\Brand\Models\Brand;
use App\Containers\CatalogSection\Category\Models\Category;
use Illuminate\Database\Eloquent\Model;

use function Illuminate\Support\now;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image_url',
        'is_active',
        'category_id',
        'brand_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function productSpecifications()
    {
        return $this->hasMany(ProductSpecification::class);
    }

    public function productItems()
    {
        return $this->hasMany(ProductItem::class);
    }

    public function getIsNewAttribute()
    {
        return $this->created_at >= now()->subDays(30);
    }
}
