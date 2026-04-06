<?php

namespace App\Containers\PromotionSection\Promotion\Tasks\Strategies;

use App\Containers\PromotionSection\Promotion\Models\Promotion;

class FixedDiscountStrategy implements PromotionStrategy
{
    public function apply(float $amount, Promotion $promotion): float
    {
        return max(0, $amount - $promotion->value);
    }
}
