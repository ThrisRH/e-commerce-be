<?php

namespace App\Containers\UserSection\User\Actions;

use App\Containers\AppSection\Authentication\Tasks\CreateUserTask;
use App\Containers\AppSection\Authorization\Tasks\AssignRoleTask;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Facades\DB;

class CreateStaffAccountAction extends Action
{
    public function run(array $data)
    {
        DB::transaction(function () use ($data) {

            $user = app(CreateUserTask::class)->run($data);

            app(AssignRoleTask::class)->run($user, $data['role']);

            return [
                'user' => $user,
            ];
        });
    }
}
