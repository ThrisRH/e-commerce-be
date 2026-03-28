<?php

namespace App\Containers\AppSection\Authentication\UI\API\Controllers;

use App\Containers\AppSection\Authentication\Actions\LoginAction;
use App\Containers\AppSection\Authentication\Actions\LogoutAction;
use App\Containers\AppSection\Authentication\Actions\RegisterAction;
use App\Ship\Parents\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
        ]);

        return app(LoginAction::class)->run($data);
    }

    // public function logout()
    // {
    //     app(LogoutAction::class)->run();

    //     return response()->json(['message' => 'Logged out']);
    // }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|min:6|max:255',
        ]);

        return app(RegisterAction::class)->run($data);
    }
}
