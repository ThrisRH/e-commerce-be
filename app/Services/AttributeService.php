<?php

namespace App\Services;

use App\Models\Attribute;

class AttributeService
{
    public function create(array $data): Attribute
    {
        return Attribute::create($data);
    }

    public function getAll()
    {
        return Attribute::latest()->paginate(10);
    }

    public function findBySlug(string $slug)
    {
        return Attribute::where('slug', $slug)->first();
    }
}
