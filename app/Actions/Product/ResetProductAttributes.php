<?php

namespace App\Actions\Product;

use App\Models\Product;

class ResetProductAttributes
{
    public function handle(Product $product)
    {
        $product->productAttributes()->delete();
    }
}
