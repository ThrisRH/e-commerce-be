<?php

namespace App\Containers\PromotionSection\Promotion\Tasks\Strategies;

use App\Containers\PromotionSection\Promotion\Models\Promotion;

class PercentageDiscountStrategy implements PromotionStrategy
{
    public function apply(float $amount, Promotion $promotion): float
    {
        $discount = $amount * ($promotion->value / 100);

        if ($promotion->max_discount) {
            $discount = min($discount, $promotion->max_discount);
        }

        return max(0, $amount - $discount);
    }
}
