<?php

namespace App\Containers\CatalogSection\Attribute\Actions;

use App\Containers\CatalogSection\Attribute\Tasks\GetAllAttributesTask;
use App\Ship\Parents\Actions\Action;

class GetAllAction extends Action
{
    private $getAllAttributesTask;

    public function __construct(GetAllAttributesTask $getAllAttributesTask)
    {
        $this->getAllAttributesTask = $getAllAttributesTask;
    }

    public function run()
    {
        return $this->getAllAttributesTask->run();
    }
}
