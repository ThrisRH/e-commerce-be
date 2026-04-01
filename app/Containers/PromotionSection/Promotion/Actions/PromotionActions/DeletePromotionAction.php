<?php

namespace App\Containers\PromotionSection\Promotion\Actions\PromotionActions;

use App\Containers\AppSection\Authentication\Actions\DeletePromotionTask;
use App\Containers\PromotionSection\Promotion\Models\Promotion;
use App\Ship\Parents\Actions\Action;

class DeletePromotionAction extends Action
{
    public function run(Promotion $promotion)
    {
        return app(DeletePromotionTask::class)->run($promotion);
    }
}
