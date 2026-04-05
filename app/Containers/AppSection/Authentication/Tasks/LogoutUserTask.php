<?php

namespace App\Containers\AppSection\Authentication\Tasks;

use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Token;

class LogoutUserTask extends Task
{
    public function run()
    {
        $user = Auth::guard('api')->user();

        $token = $user->token();
        if ($token instanceof Token) {
            $token->revoke();
        }
    }
}
