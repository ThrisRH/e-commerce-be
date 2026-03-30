<?php

namespace App\Containers\AppSection\Authorization\UI\API\Controllers;

use App\Containers\AppSection\Authorization\Actions\CreateRoleAction;
use App\Ship\Helper\ApiResponse;
use App\Ship\Parents\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthorizationController extends Controller
{
    public function index()
    {
        //
    }

    public function store(CreateRoleAction $action, Request $request)
    {
        $data = $request->validate([
            'name' => [
                'required',
                'min:2',
                'max:255',
                Rule::unique('roles', 'name')->where('guard_name', 'api'),
            ],
        ]);

        $role = $action->run($data);

        return ApiResponse::success($role);
    }
}
