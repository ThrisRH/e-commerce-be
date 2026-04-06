<?php

namespace App\Containers\UserSection\User\UI\API\Controllers;

use App\Containers\UserSection\Profile\Actions\DeleteUserAction;
use App\Containers\UserSection\Profile\Actions\GetUserByIdAction;
use App\Containers\UserSection\Profile\Actions\GetUsersAction;
use App\Containers\UserSection\Profile\Actions\UpdateUserAction;
use App\Containers\UserSection\User\Actions\CreateStaffAccountAction;
use App\Ship\Helper\ApiResponse;
use App\Ship\Parents\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function createStaff(Request $request, CreateStaffAccountAction $action)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|string|max:15',
            'role' => 'required|string|not_in:n-customer',
            'password' => 'required|string|min:6',
        ]);

        return ApiResponse::success($action->run($data));
    }

    public function getCustomers(Request $request, GetUsersAction $getUsersAction)
    {
        return ApiResponse::success($getUsersAction->run($request->limit, ['n-customer']));
    }

    public function getStaffs(Request $request, GetUsersAction $getUsersAction)
    {
        return ApiResponse::success($getUsersAction->run($request->limit, ['super-admin', 'o-manager', 'p-manager']));
    }

    public function show(Request $request, GetUserByIdAction $action)
    {
        return ApiResponse::success($action->run($request->id));
    }

    public function update(Request $request, UpdateUserAction $action, $id)
    {
        $isPut = $request->isMethod('PUT');

        $data = $request->validate([
            'name' => ($isPut ? 'required' : 'sometimes').'|string|max:255',
            'email' => [
                ($isPut ? 'required' : 'sometimes'),
                'email',
                Rule::unique('users', 'email')->ignore($id),
            ],
            'phone_number' => ($isPut ? 'required' : 'sometimes').'|string|max:15',
            'password' => ($isPut ? 'required' : 'sometimes').'|string|min:6',
        ]);

        $user = $action->run($id, $data);

        return ApiResponse::success($user, 'User updated successfully');
    }

    public function destroy(DeleteUserAction $action, $id)
    {
        $action->run($id);

        return ApiResponse::success('User deleted successfully');
    }
}
