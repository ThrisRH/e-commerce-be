<?php

namespace App\Containers\PromotionSection\Promotion\Tasks\Strategies;

use App\Containers\PromotionSection\Promotion\Models\Promotion;
use App\Ship\Parents\Tasks\Task;
use Exception;

class StrategyResolverTask extends Task
{
    public function run(Promotion $promotion): PromotionStrategy
    {
        if ($promotion->strategy_key === 'holiday_bonus') {
            return new HolidayBonusStrategy;
        }

        switch ($promotion->type) {
            case 'fixed':
                return new FixedDiscountStrategy;
            case 'percentage':
                return new PercentageDiscountStrategy;
            default:
                throw new Exception("Unsupported promotion type or strategy: {$promotion->type}");
        }
    }
}
