<?php

namespace App\Containers\AppSection\Authentication\Actions;

use App\Containers\AppSection\Authentication\Tasks\CreateUserTask;
use App\Containers\AppSection\Authentication\Tasks\GenerateTokenTask;
use App\Ship\Parents\Actions\Action;

class RegisterAction extends Action
{
    public function run(array $data)
    {
        $user = app(CreateUserTask::class)->run($data);

        $token = app(GenerateTokenTask::class)->run($user);

        return [
            'user' => $data,
            'token' => $token,
        ];
    }
}
