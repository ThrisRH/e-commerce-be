<?php

namespace App\Containers\CatalogSection\Category\Models;

use App\Containers\CatalogSection\Attribute\Models\Attribute;
use Illuminate\Database\Eloquent\Model;

class CategoryAttribute extends Model
{
    protected $fillable = [
        'category_id',
        'attribute_id',
        'is_required',
    ];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
