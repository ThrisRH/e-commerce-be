<?php

namespace App\Containers\HomeSection\Category\Actions;

use App\Containers\HomeSection\Category\Tasks\GetCateSectionTask;
use App\Ship\Parents\Actions\Action;

class GetCateSectionAction extends Action
{
    public function run()
    {
        $cateIds = [1, 2, 3];

        return app(GetCateSectionTask::class)->run($cateIds);
    }
}
