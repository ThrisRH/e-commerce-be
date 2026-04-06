<?php

namespace App\Containers\UserSection\Profile\Actions;

use App\Containers\UserSection\User\Tasks\DeleteUserTask;
use App\Containers\UserSection\User\Tasks\GetUserByIdTask;
use App\Ship\Parents\Actions\Action;

class DeleteUserAction extends Action
{
    public function __construct(
        private GetUserByIdTask $getUserByIdTask,
        private DeleteUserTask $deleteUserTask
    ) {}

    public function run($id)
    {
        $user = $this->getUserByIdTask->run($id);

        return $this->deleteUserTask->run($user);
    }
}
