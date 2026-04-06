<?php

namespace App\Containers\AppSection\Authorization\UI\API\Controllers;

use App\Containers\AppSection\Authorization\Actions\CreateRoleAction;
use App\Containers\AppSection\Authorization\Actions\DeleteRoleAction;
use App\Containers\AppSection\Authorization\Actions\GetAllRoleAction;
use App\Containers\AppSection\Authorization\Actions\GetRoleByIdAction;
use App\Containers\AppSection\Authorization\Actions\UpdateRoleAction;
use App\Ship\Helper\ApiResponse;
use App\Ship\Parents\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthorizationController extends Controller
{
    public function index()
    {
        $roles = app(GetAllRoleAction::class)->run();

        return ApiResponse::success($roles);
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

    public function show($id, GetRoleByIdAction $action)
    {
        $role = $action->run($id);

        return ApiResponse::success($role);
    }

    public function update(UpdateRoleAction $action, Request $request, $id)
    {
        $isPut = $request->isMethod('PUT');

        $validate = [
            'name' => [
                $isPut ? 'require' : 'sometimes',
                'min:2',
                'max:255',
                Rule::unique('roles', 'name')->where('guard_name', 'api')->ignore($id),
            ],
            'display_name' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
        ];

        $data = $request->validate($validate);

        $role = $action->run($id, $data);

        return ApiResponse::success($role);
    }

    public function destroy($id, DeleteRoleAction $action)
    {
        $action->run($id);

        return ApiResponse::success('Delete success');
    }
}
