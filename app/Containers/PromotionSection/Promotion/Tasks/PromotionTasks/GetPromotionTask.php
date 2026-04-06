<?php

namespace App\Containers\PromotionSection\Promotion\Tasks\PromotionTasks;

use App\Containers\PromotionSection\Promotion\Models\Promotion;
use App\Ship\Parents\Tasks\Task;

class GetPromotionTask extends Task
{
    public function run($limit = 10)
    {
        return Promotion::latest()->paginate($limit);
    }

    public function findById($id)
    {
        return Promotion::findOrFail($id);
    }
}
