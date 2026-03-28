<?php

namespace App\Containers\AppSection\Authentication\Tasks;

use App\Containers\AppSection\Authentication\Models\User;
use App\Ship\Parents\Tasks\Task;

class GenerateTokenTask extends Task
{
    public function run(User $user)
    {
        return $user->createToken('api-token')->accessToken;
    }
}
