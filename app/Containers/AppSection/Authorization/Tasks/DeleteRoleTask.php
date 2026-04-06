<?php

namespace App\Containers\AppSection\Authorization\Tasks;

use App\Ship\Parents\Tasks\Task;
use Spatie\Permission\Models\Role;

class DeleteRoleTask extends Task
{
    public function run(Role $role)
    {
        $role->delete();
    }
}
