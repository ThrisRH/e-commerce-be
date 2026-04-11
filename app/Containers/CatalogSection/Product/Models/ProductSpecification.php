<?php

namespace App\Containers\CatalogSection\Product\Models;

use App\Containers\CatalogSection\Attribute\Models\Attribute;
use Illuminate\Database\Eloquent\Model;

class ProductSpecification extends Model
{
    protected $fillable = [
        'product_id',
        'attribute_id',
        'value',
        'unit',
    ];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
