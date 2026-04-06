<?php

namespace App\Containers\AppSection\Authorization\Models;

use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    protected $fillable = [
        'name',
        'display_name',
        'description',
    ];
}
