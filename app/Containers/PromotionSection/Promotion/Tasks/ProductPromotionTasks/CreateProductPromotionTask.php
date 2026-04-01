<?php

namespace App\Containers\PromotionSection\Promotion\Tasks\ProductPromotionTasks;

use App\Containers\PromotionSection\Promotion\Models\ProductPromotion;
use App\Ship\Parents\Tasks\Task;

class CreateProductPromotionTask extends Task
{
    public function run(array $data): ProductPromotion
    {
        return ProductPromotion::create($data);
    }
}
