<?php

namespace App\Containers\HomeSection\Category\Actions;

use App\Containers\HomeSection\Category\Tasks\GetCateSectionTask;
use App\Ship\Parents\Actions\Action;

class GetCateSectionAction extends Action
{
    public function run(?array $cate_ids = null, int $limit = 10)
    {
        return app(GetCateSectionTask::class)->run($cate_ids, $limit);
    }
}
