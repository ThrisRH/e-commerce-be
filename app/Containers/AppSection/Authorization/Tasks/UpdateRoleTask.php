<?php

namespace App\Containers\AppSection\Authorization\Tasks;

use App\Ship\Parents\Tasks\Task;
use Spatie\Permission\Models\Role;

class UpdateRoleTask extends Task
{
    public function run(Role $role, array $data)
    {
        $role->fill($data);
        $role->save();

        return $role;
    }
}
