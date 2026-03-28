<?php

namespace App\Containers\AppSection\Authentication\Actions;

use App\Containers\AppSection\Authentication\Tasks\GenerateTokenTask;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Facades\Auth;

class LoginAction extends Action
{
    public function run(array $data)
    {
        if (! Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            abort(401, 'Invalid Credential!');
        }

        $user = Auth::user();

        $token = app(GenerateTokenTask::class)->run($user);

        return [
            'user' => $user,
            'token' => $token,
        ];
    }
}
