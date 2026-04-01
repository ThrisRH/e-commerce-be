<?php

namespace App\Containers\PromotionSection\Promotion\UI\API\Transformers;

class PromotionTransformer
{
    public function transform($promotion)
    {
        return [
            'id' => $promotion->id,
            'name' => $promotion->name,
            'description' => $promotion->description,
            'type' => $promotion->type,
            'value' => $promotion->value,
            'max_discount' => $promotion->max_discount,
            'start_date' => $promotion->start_date,
            'end_date' => $promotion->end_date,
            'stackable' => $promotion->stackable,
            'is_active' => $promotion->is_active,
            'priority' => $promotion->priority,
            'usage_limit' => $promotion->usage_limit,
            'usage_count' => $promotion->usage_count,
        ];
    }
}
