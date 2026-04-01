<?php

namespace App\Containers\PromotionSection\Promotion\Actions\ProductPromotionActions;

use App\Containers\PromotionSection\Promotion\Tasks\ProductPromotionTasks\CreateProductPromotionTask;
use App\Ship\Parents\Actions\Action;

class CreateProductPromotionAction extends Action
{
    public function run(array $data)
    {
        $productPromotion = app(CreateProductPromotionTask::class)->run($data);

        return $productPromotion;
    }
}
