<?php

namespace App\Containers\CatalogSection\Attribute\Tasks\Attributes;

use App\Containers\CatalogSection\Attribute\Models\Attribute;
use App\Ship\Parents\Tasks\Task;

class GetAllAttributesTask extends Task
{
    public function run()
    {
        return Attribute::all();
    }
}
