<?php

namespace App\Containers\PromotionSection\Promotion\Actions\PromotionActions;

use App\Containers\PromotionSection\Promotion\Tasks\PromotionTasks\CreatePromotionTask;
use App\Ship\Parents\Actions\Action;

class CreatePromotionAction extends Action
{
    public function run(array $data)
    {
        $promotion = app(CreatePromotionTask::class)->run($data);

        return $promotion;
    }
}
