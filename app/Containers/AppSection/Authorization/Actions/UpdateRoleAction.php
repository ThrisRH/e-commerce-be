<?php

namespace App\Containers\AppSection\Authorization\Actions;

use App\Containers\AppSection\Authorization\Tasks\GetRoleByIdTask;
use App\Containers\AppSection\Authorization\Tasks\UpdateRoleTask;
use App\Ship\Parents\Actions\Action;

class UpdateRoleAction extends Action
{
    public function __construct(private UpdateRoleTask $updateRoleTask, private GetRoleByIdTask $getRoleByIdTask) {}

    public function run($id, array $data)
    {
        $role = $this->getRoleByIdTask->run($id);

        return $this->updateRoleTask->run($role, $data);
    }
}
