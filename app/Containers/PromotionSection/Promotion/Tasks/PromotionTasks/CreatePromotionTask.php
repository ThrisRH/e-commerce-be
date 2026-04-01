<?php

namespace App\Containers\PromotionSection\Promotion\Tasks\PromotionTasks;

use App\Containers\PromotionSection\Promotion\Models\Promotion;
use App\Ship\Parents\Tasks\Task;

class CreatePromotionTask extends Task
{
    public function run(array $data): Promotion
    {
        return Promotion::create($data);
    }
}
