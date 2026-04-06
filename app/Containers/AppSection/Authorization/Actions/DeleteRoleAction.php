<?php

namespace App\Containers\AppSection\Authorization\Actions;

use App\Containers\AppSection\Authorization\Tasks\DeleteRoleTask;
use App\Containers\AppSection\Authorization\Tasks\GetRoleByIdTask;
use App\Ship\Parents\Actions\Action;

class DeleteRoleAction extends Action
{
    public function __construct(private GetRoleByIdTask $getRoleByIdTask, private DeleteRoleTask $deleteRoleTask) {}

    public function run($id)
    {
        $role = $this->getRoleByIdTask->run($id);

        $this->deleteRoleTask->run($role);
    }
}
