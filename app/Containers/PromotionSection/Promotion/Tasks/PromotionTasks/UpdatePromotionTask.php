<?php

namespace App\Containers\PromotionSection\Promotion\Tasks\PromotionTasks;

use App\Containers\PromotionSection\Promotion\Models\Promotion;
use App\Ship\Parents\Tasks\Task;

class UpdatePromotionTask extends Task
{
    public function run($id, array $data)
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->update($data);
        return $promotion;
    }
}
