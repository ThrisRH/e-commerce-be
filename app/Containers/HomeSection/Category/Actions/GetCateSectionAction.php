<?php

namespace App\Containers\HomeSection\Category\Actions;

use App\Containers\HomeSection\Category\Tasks\GetCateSectionTask;
use App\Ship\Parents\Actions\Action;

class GetCateSectionAction extends Action
{
    public function run()
    {
        return app(GetCateSectionTask::class)->run();
    }
}
