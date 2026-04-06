<?php

namespace App\Containers\PromotionSection\Promotion\Actions\Promotions;

use App\Containers\PromotionSection\Promotion\Tasks\PromotionTasks\GetPromotionTask;
use App\Ship\Parents\Actions\Action;

class GetPromotionAction extends Action
{
    public function __construct(private GetPromotionTask $getPromotionTask) {}

    public function run($limit = 10)
    {
        return $this->getPromotionTask->run($limit);
    }

    public function runOne($id)
    {
        return $this->getPromotionTask->findById($id);
    }
}
