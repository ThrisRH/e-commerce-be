<?php

namespace App\Containers\CatalogSection\Product\Models;

use App\Ship\Parents\Models\Model;

class ProductVariant extends Model
{
    protected $fillable = [
        'product_item_id',
        'sku',
        'image_url',
        'price',
        'stock',
        'is_default',
        'weight',
        'length',
        'width',
        'height',
    ];

    protected $casts = [
        'is_default' => 'boolean',
        'weight' => 'float',
        'length' => 'float',
        'width' => 'float',
        'height' => 'float',
    ];

    public function productItem()
    {
        return $this->belongsTo(ProductItem::class);
    }

    public function variantValues()
    {
        return $this->hasMany(ProductVariantAttributeValue::class, 'product_variant_id');
    }
}
