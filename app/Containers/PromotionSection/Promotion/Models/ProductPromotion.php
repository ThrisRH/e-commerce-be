<?php

namespace App\Containers\PromotionSection\Promotion\Models;

use App\Containers\CatalogSection\Product\Models\Product;
use App\Ship\Parents\Models\Model;

class ProductPromotion extends Model
{
    protected $fillable = [
        'product_id',
        'promotion_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }
}
