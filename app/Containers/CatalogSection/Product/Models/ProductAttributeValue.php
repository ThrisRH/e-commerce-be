<?php

namespace App\Containers\CatalogSection\Product\Models;

use App\Containers\CatalogSection\Attribute\Models\AttributeValue;
use App\Ship\Parents\Models\Model;

class ProductAttributeValue extends Model
{
    protected $fillable = [
        'product_id',
        'attribute_value_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function attributeValue()
    {
        return $this->belongsTo(AttributeValue::class);
    }
}
