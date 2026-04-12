<?php

namespace App\Containers\CatalogSection\Attribute\Tasks\AttributeValues;

use App\Containers\CatalogSection\Attribute\Models\AttributeValue;
use App\Ship\Parents\Tasks\Task;

class CheckExistsAttributeValueTask extends Task
{
    public function run($id)
    {
        return AttributeValue::where('id', $id)->exists();
    }
}
