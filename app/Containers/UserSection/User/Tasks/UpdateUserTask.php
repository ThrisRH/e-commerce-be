<?php

namespace App\Containers\UserSection\User\Tasks;

use App\Containers\AppSection\Authentication\Models\User;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\Hash;

class UpdateUserTask extends Task
{
    public function run(User $user, array $data)
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->fill($data);
        $user->save();

        return $user;
    }
}
