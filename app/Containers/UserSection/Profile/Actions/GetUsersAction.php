<?php

namespace App\Containers\UserSection\Profile\Actions;

use App\Containers\UserSection\User\Tasks\GetUsersTask;
use App\Ship\Parents\Actions\Action;

class GetUsersAction extends Action
{
    public function __construct(private GetUsersTask $getUsersTask) {}

    public function run($limit, array $roles)
    {
        return $this->getUsersTask->run($limit, $roles);
    }
}
