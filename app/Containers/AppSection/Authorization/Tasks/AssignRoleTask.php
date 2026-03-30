<?php

namespace App\Containers\AppSection\Authorization\Tasks;

use App\Containers\AppSection\Authentication\Models\User;
use App\Ship\Parents\Tasks\Task;

class AssignRoleTask extends Task
{
    public function run(User $user, string $role)
    {
        return $user->assignRole($role);
    }
}
