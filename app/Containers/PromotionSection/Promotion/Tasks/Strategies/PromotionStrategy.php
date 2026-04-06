<?php

namespace App\Containers\PromotionSection\Promotion\Tasks\Strategies;

use App\Containers\PromotionSection\Promotion\Models\Promotion;

interface PromotionStrategy
{
    /**
     * Apply the promotion logic to a given amount.
     * 
     * @param float $amount The current total amount
     * @param Promotion $promotion The promotion model
     * @return float The discounted amount
     */
    public function apply(float $amount, Promotion $promotion): float;
}
