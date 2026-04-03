<?php

namespace App\Containers\PromotionSection\Promotion\Tasks\ProductPromotionTasks;

use App\Containers\PromotionSection\Promotion\Models\ProductPromotion;
use App\Ship\Parents\Tasks\Task;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GetProductPromotionTask extends Task
{
    public function run()
    {
        $query = ProductPromotion::all();

        if ($query->isEmpty()) {
            throw new NotFoundHttpException('Không có chương trình khuyến mãi');
        }

        return $query;
    }
}
