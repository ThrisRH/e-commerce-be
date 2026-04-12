<?php

namespace App\Containers\CatalogSection\Attribute\Actions\AttributeValues;

use App\Containers\CatalogSection\Attribute\Models\AttributeValue;
use App\Containers\CatalogSection\Attribute\Tasks\Attributes\CheckAttributeExistsTask;
use App\Containers\CatalogSection\Attribute\Tasks\AttributeValues\CreateAttributeValueTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action;

class CreateAttributeValueAction extends Action
{
    public function __construct(private CreateAttributeValueTask $task, private CheckAttributeExistsTask $checkAttributeExistsTask) {}

    public function run(array $data): AttributeValue
    {
        $attributeExists = $this->checkAttributeExistsTask->run($data['attribute_id']);

        if (! $attributeExists) {
            throw new NotFoundException('Attribute not found');
        }

        $attributeValue = $this->task->run($data);

        return $attributeValue;
    }
}
