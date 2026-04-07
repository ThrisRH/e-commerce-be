<?php

namespace App\Containers\PromotionSection\Promotion\Tasks\PromotionTasks;

use App\Containers\CatalogSection\Product\Models\Product;
use App\Containers\PromotionSection\Promotion\Models\Promotion;
use App\Containers\PromotionSection\Promotion\Tasks\Strategies\StrategyResolverTask;
use App\Ship\Parents\Tasks\Task;

class GetProductDiscountPriceTask extends Task
{
    public function __construct(private StrategyResolverTask $strategyResolverTask) {}

    /**
     * Calculate discounted price for a single product.
     * 
     * @param Product $product
     * @return array [original_price, discounted_price, applied_promotions]
     */
    public function run(Product $product): array
    {
        $originalPrice = (float) $product->price;

        // Fetch all active promotions that could apply
        $promotions = Promotion::where('is_active', true)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->where(function ($query) use ($product) {
                $query->whereHas('products', fn($q) => $q->where('product_id', $product->id))
                      ->orWhereHas('categories', fn($q) => $q->where('category_id', $product->category_id))
                      ->orWhereHas('brands', fn($q) => $q->where('brand_id', $product->brand_id));
            })
            ->orderByDesc('priority')
            ->get();

        $currentPrice = $originalPrice;
        $appliedPromotions = [];

        foreach ($promotions as $promotion) {
            $strategy = $this->strategyResolverTask->run($promotion);
            $newPrice = $strategy->apply($currentPrice, $promotion);

            if ($newPrice < $currentPrice) {
                $currentPrice = $newPrice;
                $appliedPromotions[] = [
                    'id' => $promotion->id,
                    'name' => $promotion->name,
                    'type' => $promotion->type,
                    'value' => $promotion->value,
                ];
            }

            if (!$promotion->stackable) {
                break;
            }
        }

        return [
            'original_price' => $originalPrice,
            'discounted_price' => (int) round($currentPrice, 0),
            'applied_promotions' => $appliedPromotions,
        ];
    }
}
