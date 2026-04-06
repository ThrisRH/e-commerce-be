<?php

namespace App\Containers\PromotionSection\Promotion\Actions\Promotions;

use App\Containers\PromotionSection\Promotion\Tasks\PromotionTasks\UpdatePromotionTask;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Facades\DB;

class UpdatePromotionAction extends Action
{
    public function __construct(private UpdatePromotionTask $updatePromotionTask) {}

    public function run($id, array $data)
    {
        return DB::transaction(function () use ($id, $data) {
            $promotion = $this->updatePromotionTask->run($id, $data);

            if (isset($data['category_ids'])) {
                $promotion->categories()->sync($data['category_ids']);
            }

            if (isset($data['brand_ids'])) {
                $promotion->brands()->sync($data['brand_ids']);
            }

            if (isset($data['product_ids'])) {
                $promotion->products()->sync($data['product_ids']);
            }

            return $promotion;
        });
    }
}
