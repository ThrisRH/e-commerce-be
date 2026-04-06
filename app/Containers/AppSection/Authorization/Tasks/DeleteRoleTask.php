<?php

namespace App\Containers\AppSection\Authorization\Tasks;

use App\Ship\Parents\Tasks\Task;

class DeleteRoleTask extends Task
{
    public function run($role)
    {
        $role->delete();
    }
}
