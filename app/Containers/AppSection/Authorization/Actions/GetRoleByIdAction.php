<?php

namespace App\Containers\AppSection\Authorization\Actions;

use App\Containers\AppSection\Authorization\Tasks\GetRoleByIdTask;
use App\Ship\Parents\Actions\Action;

class GetRoleByIdAction extends Action
{
    public function __construct(private GetRoleByIdTask $getRoleByIdTask) {}

    public function run($id)
    {
        return $this->getRoleByIdTask->run($id);
    }
}
