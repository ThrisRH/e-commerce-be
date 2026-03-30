<?php

namespace App\Containers\AppSection\Authorization\Tasks;

use App\Ship\Parents\Tasks\Task;
use Spatie\Permission\Models\Role;

class CreateRoleTask extends Task
{
    public function run(array $data)
    {
        return Role::create(['name' => $data['name'], 'guard_name' => 'api']);
    }
}
