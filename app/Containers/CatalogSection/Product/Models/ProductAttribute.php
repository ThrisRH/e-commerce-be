<?php

namespace App\Containers\AppSection\Product\Models\Product;

use App\Containers\CatalogSection\Attribute\Models\Attribute;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $fillable = [
        'product_id',
        'attribute_id',
        'value',
    ];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
