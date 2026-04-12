<?php

namespace App\Containers\CatalogSection\Attribute\Actions\Attributes;

use App\Containers\CatalogSection\Attribute\Tasks\Attributes\CreateAttributeTask;
use App\Ship\Parents\Actions\Action;

class CreateAttributeAction extends Action
{
    private $createAttributeTask;

    public function __construct(CreateAttributeTask $createAttributeTask)
    {
        $this->createAttributeTask = $createAttributeTask;
    }

    public function run(array $data)
    {
        return $this->createAttributeTask->run($data);
    }
}
