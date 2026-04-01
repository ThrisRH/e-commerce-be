<?php

namespace App\Containers\PromotionSection\Promotion\Actions\ProductPromotionActions;

use App\Containers\PromotionSection\Promotion\Tasks\ProductPromotionTasks\GetProductPromotionTask;
use App\Ship\Parents\Actions\Action;

class GetProductPromotionAction extends Action
{
    public function run()
    {
        return app(GetProductPromotionTask::class)->run();
    }
}
