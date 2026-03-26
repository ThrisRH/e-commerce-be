<?php

namespace App\Containers\CatalogSection\Category\Tasks;

use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\DB;
use Exception;

class ValidateCategoryAttributesTask extends Task
{
    public function run($id, $attributes)
    {
        $validAttributeIds = DB::table('category_attributes')
            ->where('category_id', $id)
            ->pluck('attribute_id')
            ->toArray();

        foreach ($attributes as $attribute) {
            if (! in_array($attribute['attribute_id'], $validAttributeIds)) {
                throw new Exception('Invalid attribute: ' . $attribute['attribute_id']);
            }
        }

        return true;
    }
}
