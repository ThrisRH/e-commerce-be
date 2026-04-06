<?php

namespace App\Containers\AppSection\Authorization\Tasks;

use App\Ship\Parents\Tasks\Task;
use Spatie\Permission\Models\Role;

class GetRoleByIdTask extends Task
{
    public function run($id)
    {
        return Role::findOrFail($id);
    }
}
