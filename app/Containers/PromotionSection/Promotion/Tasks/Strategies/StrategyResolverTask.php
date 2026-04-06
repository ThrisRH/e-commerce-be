<?php

namespace App\Containers\PromotionSection\Promotion\Tasks\Strategies;

use App\Containers\PromotionSection\Promotion\Models\Promotion;
use App\Ship\Parents\Tasks\Task;
use Exception;

class StrategyResolverTask extends Task
{
    /**
     * Map strategy keys or promotion types to specific strategy implementations.
     * 
     * @param Promotion $promotion
     * @return PromotionStrategy
     * @throws Exception
     */
    public function run(Promotion $promotion): PromotionStrategy
    {
        // 1. Check for specific holiday/event strategies first based on strategy_key
        if ($promotion->strategy_key === 'holiday_bonus') {
            return new HolidayBonusStrategy();
        }

        // 2. Default to standard strategies based on promotion type if no special strategy_key is specified
        switch ($promotion->type) {
            case 'fixed':
                return new FixedDiscountStrategy();
            case 'percentage':
                return new PercentageDiscountStrategy();
            default:
                throw new Exception("Unsupported promotion type or strategy: {$promotion->type}");
        }
    }
}
