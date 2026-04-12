<?php

namespace App\Containers\CatalogSection\Attribute\Actions\AttributeValues;

use App\Containers\CatalogSection\Attribute\Models\AttributeValue;
use App\Containers\CatalogSection\Attribute\Tasks\AttributeValues\UpdateAttributeValueTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action;

class UpdateAttributeValueAction extends Action
{
    public function __construct(private UpdateAttributeValueTask $task) {}

    public function run($id, array $data): AttributeValue
    {
        $attributeValue = AttributeValue::where('id', $id)->first();

        if (! $attributeValue) {
            throw new NotFoundException('Attribute value not found');
        }

        $attributeValue = $this->task->run($attributeValue, $data);

        return $attributeValue;
    }
}
