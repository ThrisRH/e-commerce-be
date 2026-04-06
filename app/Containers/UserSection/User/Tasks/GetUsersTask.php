<?php

namespace App\Containers\UserSection\User\Tasks;

use App\Containers\AppSection\Authentication\Models\User;
use App\Ship\Parents\Tasks\Task;

class GetUsersTask extends Task
{
    public function run($limit = null, array $roles = [])
    {
        return User::with('roles')->role($roles)->paginate($limit ?? 10);
    }
}
