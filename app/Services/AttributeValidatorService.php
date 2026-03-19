<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class AttributeValidatorService
{
    public function validate($id, $attributes)
    {
        $validAttributeIds = DB::table('category_attributes')
            ->where('category_id', $id)
            ->pluck('attribute_id')
            ->toArray();

        foreach ($attributes as $attribute) {
            if (! in_array($attribute['attribute_id'], $validAttributeIds)) {
                throw new \Exception('Invalid attribute');
            }
        }

        return true;
    }
}
