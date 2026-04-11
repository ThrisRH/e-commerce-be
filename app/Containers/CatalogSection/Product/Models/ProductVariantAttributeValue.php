<?php

namespace App\Containers\CatalogSection\Product\Models;

use App\Containers\CatalogSection\Attribute\Models\AttributeValue;
use App\Ship\Parents\Models\Model;

class ProductVariantAttributeValue extends Model
{
    protected $fillable = [
        'product_variant_id',
        'attribute_value_id',
    ];

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }

    public function attributeValue()
    {
        return $this->belongsTo(AttributeValue::class);
    }
}
