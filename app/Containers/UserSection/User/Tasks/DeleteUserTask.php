<?php

namespace App\Containers\UserSection\User\Tasks;

use App\Containers\AppSection\Authentication\Models\User;
use App\Ship\Parents\Tasks\Task;

class DeleteUserTask extends Task
{
    public function run(User $user)
    {
        return $user->delete();
    }
}
