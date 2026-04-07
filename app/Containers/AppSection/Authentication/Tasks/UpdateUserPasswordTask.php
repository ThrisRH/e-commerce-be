<?php

namespace App\Containers\AppSection\Authentication\Tasks;

use App\Containers\AppSection\Authentication\Models\User;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\Hash;

class UpdateUserPasswordTask extends Task
{
    public function run(User $user, string $newPassword)
    {
        $user->password = Hash::make($newPassword);
        $user->save();

        return $user;
    }
}
