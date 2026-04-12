<?php

namespace App\Containers\CatalogSection\Attribute\Actions\AttributeValues;

use App\Containers\CatalogSection\Attribute\Tasks\AttributeValues\GetAttributeValueTask;
use App\Ship\Parents\Actions\Action;

class GetAttributeValueAction extends Action
{
    public function __construct(private GetAttributeValueTask $task) {}

    public function run(?int $limit)
    {
        return $this->task->run($limit);
    }
}
