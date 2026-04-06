<?php

namespace App\Containers\AppSection\Authorization\Tasks;

use App\Ship\Parents\Tasks\Task;

use Spatie\Permission\Models\Role;

class GetAllRoleTask extends Task
{
    public function run()
    {
        return Role::all();
    }
}
