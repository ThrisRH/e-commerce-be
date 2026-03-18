<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'image_url',
        'stock',
        'is_active',
        'category_id',
        'brand_id',
    ];
}
