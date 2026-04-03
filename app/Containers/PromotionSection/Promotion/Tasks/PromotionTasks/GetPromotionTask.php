<?php

namespace App\Containers\PromotionSection\Promotion\Tasks\PromotionTasks;

use App\Containers\PromotionSection\Promotion\Models\Promotion;
use App\Ship\Parents\Tasks\Task;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GetPromotionTask extends Task
{
    public function run()
    {
        $promotion = Promotion::all();

        if ($promotion->isEmpty()) {
            throw new NotFoundHttpException('Không có chương trình khuyến mãi');
        }

        return $promotion;
    }
}
