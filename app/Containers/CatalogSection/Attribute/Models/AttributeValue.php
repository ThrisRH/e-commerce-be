<?php

namespace App\Containers\CatalogSection\Attribute\Models;

use App\Containers\CatalogSection\Product\Models\ProductAttributeValue;
use App\Containers\CatalogSection\Product\Models\ProductVariantAttributeValue;
use App\Ship\Parents\Models\Model;

class AttributeValue extends Model
{
    protected $fillable = [
        'attribute_id',
        'value',
        'unit',
    ];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function productAttributeValues()
    {
        return $this->hasMany(ProductAttributeValue::class);
    }

    public function productVariantAttributeValues()
    {
        return $this->hasMany(ProductVariantAttributeValue::class);
    }
}
