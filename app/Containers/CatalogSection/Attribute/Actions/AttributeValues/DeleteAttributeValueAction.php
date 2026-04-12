<?php

namespace App\Containers\CatalogSection\Attribute\Actions\AttributeValues;

use App\Containers\CatalogSection\Attribute\Tasks\AttributeValues\DeleteAttributeValueTask;
use App\Ship\Parents\Actions\Action;

class DeleteAttributeValueAction extends Action
{
    public function __construct(private DeleteAttributeValueTask $task) {}

    public function run($id)
    {
        return $this->task->run($id);
    }
}
