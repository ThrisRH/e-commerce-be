<?php

namespace App\Containers\CatalogSection\Brand\Actions;

use App\Containers\CatalogSection\Brand\Tasks\GetAllBrandTask;
use App\Ship\Parents\Actions\Action;

class GetAllBrandAction extends Action
{
    public function __construct(private GetAllBrandTask $task) {}

    public function run()
    {
        return $this->task->run();
    }
}
