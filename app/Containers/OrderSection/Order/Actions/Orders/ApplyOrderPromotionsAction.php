<?php

namespace App\Containers\OrderSection\Order\Actions\Orders;

use App\Containers\PromotionSection\Promotion\Models\Promotion;
use App\Containers\PromotionSection\Promotion\Tasks\Strategies\StrategyResolverTask;
use App\Ship\Parents\Actions\Action;

class ApplyOrderPromotionsAction extends Action
{
    public function __construct(private StrategyResolverTask $strategyResolverTask) {}

    /**
     * Apply promotions to a set of items and return the new total.
     */
    public function run(int $total, array $applicablePromotionIds): int
    {
        $promotions = Promotion::whereIn('id', $applicablePromotionIds)
            ->where('is_active', true)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->orderByDesc('priority')
            ->get();

        $currentTotal = $total;

        foreach ($promotions as $promotion) {
            $strategy = $this->strategyResolverTask->run($promotion);

            $currentTotal = $strategy->apply($currentTotal, $promotion);

            if (! $promotion->stackable) {
                break;
            }
        }

        return $currentTotal;
    }
}
