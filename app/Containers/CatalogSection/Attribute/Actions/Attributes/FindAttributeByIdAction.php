<?php

namespace App\Containers\CatalogSection\Attribute\Actions\Attributes;

use App\Containers\CatalogSection\Attribute\Tasks\Attributes\GetAttributeByIdTask;
use App\Ship\Parents\Actions\Action;

class FindAttributeByIdAction extends Action
{
    public function __construct(private GetAttributeByIdTask $task) {}

    public function run($id)
    {
        return $this->task->run($id);
    }
}
