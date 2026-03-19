<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Attribute extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'data_type',
        'unit',
        'is_filterable',
        'is_required',
    ];

    protected static function booted()
    {
        static::creating(function ($attribute) {
            $attribute->slug = Str::slug($attribute->name);
        });
    }
}
