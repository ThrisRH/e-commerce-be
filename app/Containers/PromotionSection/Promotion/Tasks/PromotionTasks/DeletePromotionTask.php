<?php

namespace App\Containers\PromotionSection\Promotion\Tasks\PromotionTasks;

use App\Containers\PromotionSection\Promotion\Models\Promotion;
use App\Ship\Parents\Tasks\Task;

class DeletePromotionTask extends Task
{
    public function run($id)
    {
        $promotion = Promotion::findOrFail($id);
        return $promotion->delete();
    }
}
