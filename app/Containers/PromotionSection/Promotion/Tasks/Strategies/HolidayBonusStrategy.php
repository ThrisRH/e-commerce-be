<?php

namespace App\Containers\PromotionSection\Promotion\Tasks\Strategies;

use App\Containers\PromotionSection\Promotion\Models\Promotion;

class HolidayBonusStrategy implements PromotionStrategy
{
    /**
     * Extra holiday bonus: 5% extra discount.
     */
    public function apply(float $amount, Promotion $promotion): float
    {
        // First, apply standard discount
        if ($promotion->type === 'percentage') {
            $discount = $amount * ($promotion->value / 100);
        } else {
            $discount = $promotion->value;
        }

        // Add 5% extra holiday bonus
        $bonus = $amount * 0.05;

        $totalDiscount = $discount + $bonus;

        if ($promotion->max_discount) {
            $totalDiscount = min($totalDiscount, $promotion->max_discount);
        }

        return max(0, $amount - $totalDiscount);
    }
}
