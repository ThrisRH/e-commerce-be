<?php

namespace App\Containers\PromotionSection\Promotion\Actions\Promotions;

use App\Containers\PromotionSection\Promotion\Tasks\PromotionTasks\DeletePromotionTask;
use App\Ship\Parents\Actions\Action;

class DeletePromotionAction extends Action
{
    public function __construct(private DeletePromotionTask $deletePromotionTask) {}

    public function run($id)
    {
        return $this->deletePromotionTask->run($id);
    }
}
