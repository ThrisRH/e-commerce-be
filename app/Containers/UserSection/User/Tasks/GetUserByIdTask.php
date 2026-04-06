<?php

namespace App\Containers\UserSection\User\Tasks;

use App\Containers\AppSection\Authentication\Models\User;
use App\Ship\Parents\Tasks\Task;

class GetUserByIdTask extends Task
{
    public function run($id)
    {
        return User::with('roles:name')->findOrFail($id);
    }
}
