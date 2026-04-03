<?php

namespace App\Containers\PromotionSection\Promotion\Actions\PromotionActions;

use App\Containers\PromotionSection\Promotion\Tasks\PromotionTasks\GetPromotionTask as TasksGetPromotionTask;
use App\Ship\Parents\Actions\Action;

class GetPromotionAction extends Action
{
    public function run()
    {
        return app(TasksGetPromotionTask::class)->run();
    }
}
