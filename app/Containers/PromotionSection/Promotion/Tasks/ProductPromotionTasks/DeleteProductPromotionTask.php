<?php

namespace App\Containers\PromotionSection\Promotion\Tasks\ProductPromotionTasks;

use App\Containers\PromotionSection\Promotion\Models\ProductPromotion;
use App\Ship\Parents\Tasks\Task;

class DeleteProductPromotionTask extends Task
{
    public function run(ProductPromotion $productPromotion)
    {
        return $productPromotion->delete();
    }
}
