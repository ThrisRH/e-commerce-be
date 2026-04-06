<?php

namespace App\Containers\AppSection\Authentication\UI\API\Controllers;

use App\Containers\AppSection\Authentication\Actions\LoginAction;
use App\Containers\AppSection\Authentication\Actions\LogoutAction;
use App\Containers\AppSection\Authentication\Actions\MeAction;
use App\Containers\AppSection\Authentication\Actions\RegisterAction;
use App\Containers\AppSection\Authentication\UI\API\Transfomers\AuthTransfomer;
use App\Ship\Helper\ApiResponse;
use App\Ship\Parents\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
        ]);

        $result = app(LoginAction::class)->run($data);

        return ApiResponse::success([
            'user' => app(AuthTransfomer::class)->transform($result['user']),
            'access_token' => $result['access_token'],
        ]);
    }

    public function me(MeAction $action)
    {
        $user = $action->run();

        return ApiResponse::success(app(AuthTransfomer::class)->transform($user));
    }

    public function logout()
    {
        app(LogoutAction::class)->run();

        return ApiResponse::success(['message' => 'Logged out']);
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'phone_number' => 'required|string|max:12',
            'password' => 'required|min:6|max:255',
        ]);

        app(RegisterAction::class)->run($data);

        return ApiResponse::success('Register success', Response::HTTP_CREATED);
    }
}
