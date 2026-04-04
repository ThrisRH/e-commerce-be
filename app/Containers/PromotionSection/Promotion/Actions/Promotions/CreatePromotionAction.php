<?php

namespace App\Containers\PromotionSection\Promotion\Actions\Promotions;

use App\Containers\PromotionSection\Promotion\Tasks\Promotions\CreatePromotionTask;
use App\Ship\Parents\Actions\Action;

class CreatePromotionAction extends Action
{
    public function __construct(private CreatePromotionTask $createPromotionTask) {}

    public function run(array $data)
    {
        return $this->createPromotionTask->run($data);
    }
}
