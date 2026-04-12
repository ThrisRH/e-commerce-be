<?php

namespace App\Containers\CatalogSection\Attribute\Tasks\Attributes;

use App\Containers\CatalogSection\Attribute\Models\Attribute as ModelsAttribute;
use App\Ship\Parents\Tasks\Task;

class CheckAttributeExistsTask extends Task
{
    public function run($id)
    {
        return ModelsAttribute::where('id', $id)->exists();
    }
}
