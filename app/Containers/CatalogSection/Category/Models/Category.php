<?php

namespace App\Containers\CatalogSection\Category\Models;

use App\Containers\CatalogSection\Product\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image_url',
        'sort_order',
        'is_active',
        'parent_id',
    ];

    protected static function booted()
    {
        static::creating(function ($category) {
            if (!$category->slug) {
                $category->slug = Str::slug($category->name);
            }
        });

        static::updating(function ($category) {
            if ($category->isDirty('name')) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function categoryAttributes()
    {
        return $this->hasMany(CategoryAttribute::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(\App\Containers\CatalogSection\Attribute\Models\Attribute::class, 'category_attributes')
            ->withPivot('is_required')
            ->withTimestamps();
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
