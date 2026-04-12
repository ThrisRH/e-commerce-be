<?php

namespace App\Containers\CatalogSection\Attribute\Tasks\AttributeValues;

use App\Containers\CatalogSection\Attribute\Models\AttributeValue;
use App\Ship\Parents\Tasks\Task;

class DeleteAttributeValueTask extends Task
{
    public function run($id)
    {
        return AttributeValue::destroy($id);
    }
}
